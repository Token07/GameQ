<?php
/**
 * This file is part of GameQ.
 *
 * GameQ is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * GameQ is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace GameQ\Protocols;

use GameQ\Protocol;
use GameQ\Buffer;
use GameQ\Result;

/**
 * GameSpy3 Protocol class
 *
 * Given the ability for non utf-8 characters to be used as hostnames, player names, etc... this
 * version returns all strings utf-8 encoded (utf8_encode).  To access the proper version of a
 * string response you must use utf8_decode() on the specific response.
 *
 * @author Austin Bischoff <austin@codebeard.com>
 */
class Bf2 extends Gamespy3
{

    /**
     * Array of packets we want to look up.
     * Each key should correspond to a defined method in this or a parent class
     *
     * @type array
     */
    protected $packets = [
        self::PACKET_ALL       => "\xFE\xFD\x00\x10\x20\x30\x40\xFF\xFF\xFF\x01",
    ];

    /**
     * The query protocol used to make the call
     *
     * @type string
     */
    protected $protocol = 'gamespy3';

    /**
     * String name of this protocol class
     *
     * @type string
     */
    protected $name = 'bf2';

    /**
     * Longer string name of this protocol class
     *
     * @type string
     */
    protected $name_long = "Battlefield 2";

    /**
     * The client join link
     *
     * @type string
     */
	 
    protected $join_link = null;
	
	protected $normalize = [
		'general' => [
			'hostname'   => 'hostname',
			'maxplayers' => 'maxplayers',
		],
		'player'  => [
            'name'  => 'player',
            'score' => 'score',
            'ping' => 'ping',
        ],
	];
}