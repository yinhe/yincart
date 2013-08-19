<?php
/**
 * DocCommand class file.
 *
 * @author Marc Busqué <marc@lamarciana.com>, heavily based on previous work by Qiang Xue <qiang.xue@gmail.com>
 * @link http://github.com/laMarciana/yiiDocumentor
 * @copyright Copyright &copy; 2012 Marc Busqué, on previously &copy; 2008-2011 Yii Software LLC
 * @license GNU LESSER GPL 3
 * @version 1.0
 */
Yii::import('application.commands.doc.DocModel');

/**
 * APP_PATH refers to the application base path
 */
defined("APP_PATH") or define("APP_PATH", dirname(dirname(__FILE__)));
/**
 * EXTENSIONS_PATH refers to the extensions base path
 */
defined("EXTENSIONS_PATH") or define("EXTENSIONS_PATH", dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'extensions');

class DocCommand extends CConsoleCommand
{
   const URL_PATTERN='/\{\{([^\}]+)\|([^\}]+)\}\}/';
   public $pageTitle;
   public $classes;
   public $packages;
   public $themePath;
   public $currentClass;
   /**
    * @var string base path for the source code to document, that's Yii framework directory, application directory or an extension directory
    */
   public $basePath;
   /**
    * @var string url to the base source of Yii code 
    */
   public $yiiBaseSourceUrl="https://github.com/yiisoft/yii/blob";
   /**
    * @var string url to the base source of the code documented. Equal to $yiiBaseSourceUrl if what is being documented is Yii itself
    */
   public $baseSourceUrl;
   /**
    * @var string text preffixed to the line number in the anchor used in the url to point to a line number in Yii framework source url. For example, in URLS of the type https://github.com/yiisoft/yii/blob/1.1.8/framework/i18n/CChoiceFormat.php#L72 it's L
    */
   public $yiiAnchorLinePreffix = 'L';
   /**
    * @var string text preffixed to the line number in the anchor used in the url to point to a line number in base source url. For example, in URLS of the type https://github.com/user/myProject/blob/1.0/myClass.php#L72 it's L
    */
   public $anchorLinePreffix;
   /**
    * @var string when an extension is being documented, its directory name
    */
   public $extensionDirectory;
   /**
    * @var boolean whether to include yii framework class reference when documenting an aplication or an extension
    */
   public $withYii;
   /**
    * @var boolean if $whitYii is false, whether to include external links to Yii framework class reference online
    */
   public $withYiiLinks;
   /**
    * @var string name of the project being documented
    */
   public $name;
   /**
    * @var string url of the project being documented
    */
   public $url;
   public $version;
   /**
    * @var array options used for CFileHelper::findFiles when scanning Yii framework directory
    */
   public $yiiOptions=array(
      'fileTypes'=>array('php'),
      'exclude'=>array(
         '.git',
         '.gitignore',
         '.svn',
         '/yiilite.php',
         '/yiit.php',
         '/cli',
         '/i18n/data',
         '/messages',
         '/test',
         '/vendors',
         '/views',
         '/web/js',
         '/web/widgets/views',
         '/utils/mimeTypes.php',
         '/gii/assets',
         '/gii/components',
         '/gii/controllers',
         '/gii/generators',
         '/gii/models',
         '/gii/views',
      )
   );
   /**
    * @var array options used for CFileHelper::findFiles when scanning an aplication directory
    */
   public $appOptions=array(
      'fileTypes' => array('php'),
      'exclude' => array(
         '.svn',
         '.git',
         '/yiic.php',
         '/commands/doc',
         '/commands/DocCommand.php',
         '/config',
         '/data',
         '/extensions',
         '/messages',
         '/migrations',
         '/runtime',
         '/vendors',
         '/views',
         '/tests',
      )
   );
   /**
    * @var array options used for CFileHelper::findFiles when scanning an extension directory
    */
   public $extOptions = array(
      'fileTypes' => array('php'),
      'exclude' => array(
         '.svn',
         '.git',
         'views',
      ),
   );

   public function getHelp()
   {
      return <<<EOD
USAGE
  yiic doc yii <output-path>
  yiic doc app <output-path>
  yiic doc ext <output-path> <ext-directory-name>
  yiic doc yii check
  yiic doc app check
  yiic doc ext check <ext-directory-name>

DESCRIPTION
  This command generates API reference documentation for the Yii framework, a Yii application or a Yii extension.
  When building api reference for an application or an extension, the output can be configured using an 'api.php' configuration file. Look at the documentation at https://github.com/laMarciana/yiiDocumentor for details.

PARAMETERS
  * yii: builds API reference documentation for the Yii framework.
  * app: builds API reference documentation for a Yii application.
  * ext: builds API reference documentation for a Yii extension.
  * <output-path>: the directory where generated documentation will be saved. It must already exists.
  * <ext-directory-name>: to be used when first parameter is 'ext'. The name of the extension directory relative to 'extensions/'.

  * check: check PHPDoc for proper @param syntax for the Yii framework, a Yii application or a Yii extension.

EXAMPLES
  * yiic doc yii doc - builds api reference documentation in folder doc for the Yii framework
  * yiic doc app doc - builds api reference documentation in folder doc for a Yii application
  * yiic doc ext doc MyExtension - builds api reference documentation in folder doc for an extension located in 'extensions/MyExtension'

  * yiic doc app check - cheks PHPDoc @param directives for a Yii application

EOD;
   }

   /**
    * Execute the action.
    * @param array command line parameters specific for this command
    */
   public function run($args)
   {
      if(!isset($args[0])) {
         $this->usageError("api reference target must be specified. It should be 'yii' for the framework, 'app' for an application or 'ext' for an extension.");
      }

      /*set base path and file options*/
      if ($args[0] === 'yii') {
         $this->basePath = YII_PATH;
         $options = $this->yiiOptions;
      } elseif ($args[0] === 'app') {
         $this->basePath = APP_PATH;
         $options = $this->appOptions;
      } elseif ($args[0] === 'ext') {
         if (!isset($args[2])) {
            $this->usageError("the extension directory name (relative to 'extensions/') must be provided.");
         }
         $extDirectoryName = $args[2];
         $this->basePath = EXTENSIONS_PATH.DIRECTORY_SEPARATOR.$extDirectoryName;
         if (!is_dir($this->basePath))
            $this->usageError("the extension directory $this->basePath does not exist.");
         $options = $this->extOptions;
      } else {
         $this->usageError("invalid argument value '{$args[0]}' as api reference target. It should be 'yii' for the framework, 'app' for an application or 'ext' for an extension.");
      }

      if (!isset($args[1]))
         $this->usageError("output directory must be specified.");

      if($args[1]=='check') {
         $checkFiles=CFileHelper::findFiles($this->basePath,$options);
         $model=new DocModel;
         $model->check($checkFiles);
         exit();
      }

      if(!is_dir($docPath=$args[1]))
         $this->usageError("the output directory '{$docPath}' does not exist.");

      /*configuration*/
      if ($args[0] === 'yii') {
         $this->name = 'Yii Framework';
         $this->withYii = false;
         $this->withYiiLinks = true;
         $this->baseSourceUrl = $this->yiiBaseSourceUrl;
         $this->anchorLinePreffix = 'L';
      } else {
         $config_path = $this->basePath.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'api.php';
         if (file_exists($config_path)) {
            $config = require_once($config_path);
         } else {
            $config = array();
         }
         //Add yii reference?
         if (isset($config['with_yii'])) {
            $this->withYii = $config['with_yii'] === true ? true : false;
         } else {
            $this->withYii = false;
         }
         //Add links to external yii class reference?
         if (isset($config['with_yii_links'])) {
            $this->withYiiLinks = $config['with_yii_links'] === false ? false : true;
         } else {
            $this->withYiiLinks = true;
         }
         //Name
         if (isset($config['name'])) {
            $this->name = $config['name'];
         } else {
            if ($args[0] === 'app') {
               if (isset($config['console_application']) && $config['console_application'] === true) {
                  $this->name = Yii::app()->name;
               } else {
                  $web_conf = include('config/main.php');
                  $this->name = isset($web_conf['name']) ? $web_conf['name'] : 'My Application';
               }
            } elseif ($args[0] === 'ext') {
               $this->name = $args[2];
            }
         }
         //url
         $this->url = isset($config['url']) ? $config['url'] : null;
         //source_url
         $this->baseSourceUrl = isset($config['source_url']) ? $config['source_url'] : null;
         //line_anchor_preffix
         $this->anchorLinePreffix = isset($config['anchor_line_preffix']) ? $config['anchor_line_preffix'] : null;
         //exclude options
         if (isset($config['exclude'])) {
            if (is_array($config['exclude'])) {
               $options['exclude'] = array_merge($options['exclude'], $config['exclude']);
            }
         }
      }
      /*For an application whic yii and extensions are not included, we need to add extensions folder to the include path*/
      if ($this->basePath === APP_PATH) {
         self::import_rec('application.extensions.*');
      }

      $this->version=Yii::getVersion();

      /*
       * development version - link to master
       * release version link to tags
       */
      if(substr($this->version,-3)=='dev')
         $this->yiiBaseSourceUrl .= '/master/framework';
      else
         $this->yiiBaseSourceUrl .= '/'.$this->version.'/framework';

      $themePath=dirname(__FILE__).'/doc';

      echo "\nBuilding.. : " . $this->name." Class Reference \n";
      echo "Yii Version... : " . $this->version."\n";
      if ($this->baseSourceUrl !== null )echo "Source URL : " . $this->baseSourceUrl."\n\n";

      echo "Building model...\n";
      $model=$this->buildModel($this->basePath,$options);
      $this->classes=$model->classes;
      $this->packages=$model->packages;

      echo "Building pages...\n";
      $this->buildOfflinePages($docPath.DIRECTORY_SEPARATOR.'api',$themePath);
      echo "Done.\n\n";
   }

   protected function buildPackages($docPath)
   {
      file_put_contents($docPath.'/api/packages.txt',serialize($this->packages));
   }

   protected function buildKeywords($docPath)
   {
      $keywords=array();
      foreach($this->classes as $class)
         $keywords[]=$class->name;
      foreach($this->classes as $class)
      {
         $name=$class->name;
         foreach($class->properties as $property)
         {
            if(!$property->isInherited)
               $keywords[]=$name.'.'.$property->name;
         }
         foreach($class->methods as $method)
         {
            if(!$method->isInherited)
               $keywords[]=$name.'.'.$method->name.'()';
         }
      }
      file_put_contents($docPath.'/api/keywords.txt',implode(',',$keywords));
   }

   public function render($view,$data=null,$return=false,$layout='main')
   {
      $viewFile=$this->themePath."/views/{$view}.php";
      $layoutFile=$this->themePath."/layouts/{$layout}.php";
      $content=$this->renderFile($viewFile,$data,true);
      return $this->renderFile($layoutFile,array('content'=>$content),$return);
   }

   public function renderPartial($view,$data=null,$return=false)
   {
      $viewFile=$this->themePath."/views/{$view}.php";
      return $this->renderFile($viewFile,$data,$return);
   }

   /**
    * @param mixed $sourcePathType type of the source path. 'yii' if it's a Yii framework source path, 'app' if it's for a yii application, 'ext' if it's for an extension or 'current-ext' if it's for an extension and this extension is what is beig documented
    */
   public function renderSourceLink($sourcePath,$line=null,$sourcePathType=null)
   {
      if ($sourcePathType === 'yii') {
         $text = 'framework'.$sourcePath;
         $url = ($this->withYiiLinks) ? $this->yiiBaseSourceUrl.$sourcePath : null;
         $anchorLinePreffix = $this->yiiAnchorLinePreffix;
      } elseif ($sourcePathType === 'app' || $sourcePathType === 'ext') {
         $text = 'protected'.$sourcePath;
         $url = (isset($this->baseSourceUrl) ? $this->baseSourceUrl.$sourcePath : null);
         $anchorLinePreffix = $this->anchorLinePreffix;
      } elseif ($sourcePathType === 'current-ext') {
         $text = 'extensions'.$this->extensionDirectory.$sourcePath;
         $url = (isset($this->baseSourceUrl) ? $this->baseSourceUrl.$sourcePath : null);
         $anchorLinePreffix = $this->anchorLinePreffix;
      }
      if ($url === null)
         return '';
      else {
         if($line===null) {
            return CHtml::link($text,$url,array('class'=>'sourceLink'));
         } else {
            return CHtml::link($text.'#'.$anchorLinePreffix.$line,$url.'#'.$anchorLinePreffix.$line,array('class'=>'sourceLink'));
         }
      }
   }

   public function highlight($code,$limit=20)
   {
      $code=preg_replace("/^    /m",'',rtrim(str_replace("\t","    ",$code)));
      $code=highlight_string("<?php\n".$code,true);
      return preg_replace('/&lt;\\?php<br \\/>/','',$code,1);
   }

   protected function buildOfflinePages($docPath,$themePath)
   {
      $this->themePath=$themePath;
      @mkdir($docPath);
      $content=$this->render('index',null,true);
      $content=preg_replace_callback(self::URL_PATTERN,array($this,'fixOfflineLink'),$content);
      file_put_contents($docPath.'/index.html',$content);

      foreach($this->classes as $name=>$class)
      {
         $this->currentClass=$name;
         $this->pageTitle=$name;
         $content=$this->render('class',array('class'=>$class),true);
         $content=preg_replace_callback(self::URL_PATTERN,array($this,'fixOfflineLink'),$content);
         file_put_contents($docPath.'/'.$name.'.html',$content);
      }

      CFileHelper::copyDirectory($this->themePath.'/assets',$docPath);

      $content=$this->renderPartial('chmProject',null,true);
      file_put_contents($docPath.'/manual.hhp',$content);

      $content=$this->renderPartial('chmIndex',null,true);
      file_put_contents($docPath.'/manual.hhk',$content);

      $content=$this->renderPartial('chmContents',null,true);
      file_put_contents($docPath.'/manual.hhc',$content);
   }

   protected function buildModel($sourcePath,$options)
   {
      $files=CFileHelper::findFiles($sourcePath,$options);
      if ($this->withYii) {
         foreach(CFileHelper::findFiles(YII_PATH,$this->yiiOptions) as $file) {
            $files[] = $file;
         }
         /*If it's an application with yii, extensions must be included, too*/
         if ($this->basePath === APP_PATH) {
            foreach(CFileHelper::findFiles(EXTENSIONS_PATH,$this->extOptions) as $file) {
               $files[] = $file;
            }

         }
      }
      $model=new DocModel(array(
         'basePath' => $this->basePath,
         'name' => $this->name,
         'withYii' => $this->withYii,
         'withYiiLinks' => $this->withYiiLinks,
         'url' => $this->url,
      ));
      $model->build($files);
      return $model;
   }

   public function renderInheritance($class)
   {
      $parents=array($class->signature);
      foreach($class->parentClasses as $parent)
      {
         if(isset($this->classes[$parent]))
            $parents[]='{{'.$parent.'|'.$parent.'}}';
         else
            $parents[] = $this->getExcludedClassName($parent);
      }
      return implode(" &raquo;\n",$parents);
   }

   public function renderImplements($class)
   {
      $interfaces=array();
      foreach($class->interfaces as $interface)
      {
         if(isset($this->classes[$interface]))
            $interfaces[]='{{'.$interface.'|'.$interface.'}}';
         else
            $interfaces[] = $this->getExcludedClassName($interface);
      }
      return implode(', ',$interfaces);
   }

   public function renderSubclasses($class)
   {
      $subclasses=array();
      foreach($class->subclasses as $subclass)
      {
         if(isset($this->classes[$subclass]))
            $subclasses[]='{{'.$subclass.'|'.$subclass.'}}';
         else
            $subclasses[] = $this->getExcludedClassName($subclass);
      }
      return implode(', ',$subclasses);
   }

   public function renderTypeUrl($type,$sourcePathType='')
   {
      if(isset($this->classes[$type]) && $type!==$this->currentClass)
         return '{{'.$type.'|'.$type.'}}';
      else {
         if ($sourcePathType==='yii' && $this->withYiiLinks && !in_array($type,array('string','integer','int','boolean','bool','float','double','object','mixed','array','resource','void','null','callback','false','true','self'))) {
            return self::renderYiiApiLink($type, $type);
         } else {
            return $type;
         }
      }
   }

   /**
    * @param mixed $sourcePathType type of the source path. 'yii' if it's a Yii framework source path, 'app' if it's for a yii application, 'ext' if it's for an extension or 'current-ext' if it's for an extension and this extension is what is beig documented
    */
   public function renderSubjectUrl($type,$subject,$text=null,$sourcePathType='')
   {
      if($text===null)
         $text=$subject;
      if(isset($this->classes[$type])) {
         return '{{'.$type.'::'.$subject.'-detail'.'|'.$text.'}}';
      }
      else {
         if ($sourcePathType==='yii' && $this->withYiiLinks) {
            return self::renderYiiApiLink($type, $text, $subject);
         } else {
            return $text;
         }
      }
   }

   public function renderPropertySignature($property)
   {
      if(!empty($property->signature))
         return $property->signature;
      $sig='';
      if(!empty($property->getter))
         $sig=$property->getter->signature;
      if(!empty($property->setter))
      {
         if($sig!=='')
            $sig.='<br/>';
         $sig.=$property->setter->signature;
      }
      return $sig;
   }

   public function fixMethodAnchor($class,$name)
   {
      if(isset($this->classes[$class]->properties[$name]))
         return $name."()";
      else
         return $name;
   }

   protected function fixOfflineLink($matches)
   {
      if(($pos=strpos($matches[1],'::'))!==false)
      {
         $className=substr($matches[1],0,$pos);
         $method=substr($matches[1],$pos+2);
         return "<a href=\"{$className}.html#{$method}\">{$matches[2]}</a>";
      }
      else
         return "<a href=\"{$matches[1]}.html\">{$matches[2]}</a>";
   }

   protected function getExcludedClassName($class)
   {
      $reflection = new ReflectionClass($class);
      if ($this->withYiiLinks && (strpos($reflection->getFileName(), YII_PATH)!==false)) {
         return self::renderYiiApiLink($class, $class);
      } else {
         return $class;
      }
   }

   /**
    * Render an external link to Yii class reference for a subject
    * @param string $class the class name
    * @param string $text the text for the link
    * @param member $member the class member if any. Null by default
    *
    * @return string external link to Yii class reference for a subject
    */
   static protected function renderYiiApiLink($class, $text, $member=null)
   {
      $link = '<a href="http://www.yiiframework.com/doc/api/'.substr(Yii::getVersion(), 0, 3).'/'.$class;
      if ($member) {
         $link .= '/#'.$member.'-detail';
      }
      $link .= '">'.$text.'</a>';

      return $link;
   }

   /**
    * import recursively a directory. Based on issue #1568 of Yii framework (http://code.google.com/p/yii/issues/detail?id=1568)
    */
   private static function import_rec($alias)
   {
      $includePaths=array_unique(explode(PATH_SEPARATOR,get_include_path()));
      $path = YiiBase::getPathOfAlias($alias);
      array_unshift($includePaths,self::expandPath($path));
      set_include_path('.'.PATH_SEPARATOR.implode(PATH_SEPARATOR,$includePaths));
   }

   /**
    * import recursively a directory. Based on issue #1568 of Yii framework (http://code.google.com/p/yii/issues/detail?id=1568)
    */
   private static function expandPath($path)
   {
      $paths='';
      $folder=opendir($path);
      while(($file=readdir($folder))!==false)
      {
         if($file[0]!=='.' && is_dir($dir=$path.DIRECTORY_SEPARATOR.$file))
            $paths.=self::expandPath($dir).PATH_SEPARATOR;
      }
      closedir($folder);
      return $paths==='' ? $path : $paths.$path;
   }
}
