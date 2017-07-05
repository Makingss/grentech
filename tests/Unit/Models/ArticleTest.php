<?php
namespace Tests\Unit;

use App\Models\Article;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/6/4
 * Time: 9:49
 */
class ArticleTest extends \TestCase
{

	use DatabaseTransactions;// 使用工厂模式生成测试数据，每次不重复生成数据

	public function setUp()
	{

		parent::setUp();
		$this->beginDatabaseTransaction();
	}

	/** @test */
	public function it_fetches_trending_article()
	{
//		factory(Article::class, 3)->create();
		factory(Article::class)->create(['reads' => 10]);
		$mostPopular = factory(Article::class)->create(['reads' => 20]);
		$articles = Article::trending();
		$this->assertEquals($mostPopular->id, $articles->first()->id);
	}

}