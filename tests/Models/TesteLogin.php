<?php  

use PHPUnit\Framework\TestCase;
use Apteles\Acme\Models\Post;
/**
 * 
 */

class ScriptsTestes extends TestCase
{
	public function Testemylife()
	{
		include_once 'login_preg.php';
        $result = someFunction();

        $this->assertEquals('expected result', $result);
	} 
}