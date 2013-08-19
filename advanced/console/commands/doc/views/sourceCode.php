<div class="sourceCode">
<b>Source Code:</b> <?php echo $this->renderSourceLink($object->sourcePath,$object->startLine,$object->sourcePathType); ?> (<b><a href="#" class="show">show</a></b>)
<div class="code"><?php echo $this->highlight($object->getSourceCode()); ?></div>
</div>
