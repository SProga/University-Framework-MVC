<?php
namespace myFramework;


class Validator extends ValidatorAbstract
{

	use ErrorHandler;


	public function isPasswordValid(string $password) :bool
	{

		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@',$password);

		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
			$this->setError('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
			return false;
		}
		else{
			return true ;
		}

	} //end is PasswordValid

	public function isEmailValid(string $data) : bool
	{
		if(filter_var($data, FILTER_VALIDATE_EMAIL)===FALSE)  {
			return false;
		}
		return true;
	}

  public function passwordMatch($password , $retypedPwd)
	{
		if($password == $retypedPwd)
		{
			return true;
		}
		else {
			return false;
		}
	}

} // end Validator
