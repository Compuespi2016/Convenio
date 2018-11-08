<?php  

use PHPUnit\Framework\TestCase;
use Apteles\Acme\Models\Post;

/**
 * 
 */
class PostTest extends TestCase
{
	
	public function test_if_title_can_be_assing()
	{
		$post = new Post();
		$post->setTitle('The First');

		$this->assertEquals('The First Test', $post->getTitle());
	}
}
