<?php
/*
 *  $Id: api.php 8 2011-04-03 17:58:53Z k42b3 $
 *
 * psx
 * A object oriented and modular based PHP framework for developing
 * dynamic web applications. For the current version and informations
 * visit <http://phpsx.org>
 *
 * Copyright (c) 2011 Christoph Kappestein <k42b3.x@gmail.com>
 *
 * This file is part of psx. psx is free software: you can
 * redistribute it and/or modify it under the terms of the
 * GNU General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or any later version.
 *
 * psx is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with psx. If not, see <http://www.gnu.org/licenses/>.
 */

namespace oauth;

use PSX\Oauth\ProviderAbstract;
use PSX\Oauth\Provider\Data\Consumer;
use Exception;

/**
 * api
 *
 * @author     Christoph Kappestein <k42b3.x@gmail.com>
 * @license    http://www.gnu.org/licenses/gpl.html GPLv3
 * @link       http://test.phpsx.org
 * @category   Module
 * @package    Oauth
 * @version    $Revision: 8 $
 */
class api extends ProviderAbstract
{
	const CONSUMER_KEY    = 'dpf43f3p2l4k3l03';
	const CONSUMER_SECRET = 'kd94hf93k423kf44';

	const TOKEN           = 'nnch734d00sl2jdk';
	const TOKEN_SECRET    = 'pfkkdhi9sl3r4s00';

	public function onLoad()
	{
		try
		{
			$this->handle();
		}
		catch(Exception $e)
		{
			header('HTTP/1.1 500 Internal Server Error');
			header('Content-Type: text/plain');

			echo $e->getMessage() . "\n";

			if($this->config['psx_debug'] === true)
			{
				echo "\n" . $e->getTraceAsString() . "\n";
			}
		}
	}

	protected function getConsumer($consumerKey, $token)
	{
		if($consumerKey == self::CONSUMER_KEY && $token == self::TOKEN)
		{
			return new Consumer(self::CONSUMER_KEY, self::CONSUMER_SECRET, self::TOKEN, self::TOKEN_SECRET);
		}
	}

	protected function onAuthenticated()
	{
		echo 'SUCCESS';
	}
}

