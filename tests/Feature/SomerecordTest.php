<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
//use app\Somerecord;
//include_once dirname(__FILE__) . 'SomerecordsController.php';
use app\Http\Controllers\SomerecordsController;

class SomerecordTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function testCreate()
    {
        $this->visit(dirname(__FILE__) .'/somerecords')
        ->click('投稿')
        ->seePageIs('/somerecords/create')
        //フォームの入力
        ->type('タイトル1', 'title')
        ->type('メモ1', 'memo')
        ->press('投稿')
        // テストデータの確認
        ->seePageIs('/somerecords')
        ->see('タイトル1')
        ->see('本文1');
    }
    
    public function testIndex()
    {
        //include_once dirname(__FILE__) . '/somerecords.blade.php';
        //var_dump($somerecords);
        
        $this->visit('/somerecords')
        ->see('投稿');
        
    }
}
