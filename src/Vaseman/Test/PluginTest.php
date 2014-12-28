<?php
/**
 * Part of vaseman project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Vaseman\Test;

use Vaseman\Controller\Page\GetController;
use Windwalker\Core\Package\PackageHelper;
use Windwalker\Core\Test\AbstractBaseTestCase;
use Windwalker\Ioc;

/**
 * The PageRenderTest class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class PluginTest extends AbstractBaseTestCase
{
	/**
	 * Property controller.
	 *
	 * @var GetController
	 */
	protected $controller;

	/**
	 * setUp
	 *
	 * @return  void
	 */
	public function setUp()
	{
		$this->controller = new GetController(null, Ioc::getApplication(), Ioc::factory(), PackageHelper::getPackage('vaseman'));
	}

	public function testDataProvider()
	{
		$this->controller->getInput()->set('paths', array('provider'));

		$compare = <<<HTML
Hello, Flower
HTML;

		$this->assertStringDataEquals($compare, $this->controller->execute());
	}
}
