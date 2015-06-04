<?php
namespace tests\codeception\frontend;

use tests\codeception\frontend\FunctionalTester;

class ArticleCest
{
    // tests
    public function testArticlesList(FunctionalTester $I)
    {
        $I->amOnPage(['article/index']);
        $I->canSee('Articles', 'h1');
        $I->canSee('Test Article 1', 'h2');
        $I->dontSee('Test Article 2', 'h2');
    }

    public function testArticleView(FunctionalTester $I)
    {
        $I->amOnPage(['article/view', 'id' => 1]);
        $I->canSee('Test Article 1', 'h1');
        $I->canSee('Lorem ipsum');
        $I->canSeeLink('Test File', 'http://example.org/test-file.png');
        $I->amOnPage(['article/view', 'id' => 2]);
        $I->canSee('404');
    }
}