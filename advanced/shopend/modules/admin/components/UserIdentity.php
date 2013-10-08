<?php

class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
     * @throws CException
	 */
    public function authenticate()
	{
        $store = Store::model()->findByPk($_SESSION['store']['store_id']);
		$password = $store->password;
		if($password===null)
			throw new CException('Please configure the "password" property of the "admin" module.');
		elseif($password===false || $password===$store->password)
			$this->errorCode=self::ERROR_NONE;
        else
            $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
		return !$this->errorCode;
	}
}