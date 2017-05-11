<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * doc html data format writer
 *
 * @package    dataformat_doc
 * @copyright  2016 Brendan Heywood (brendan@catalyst-au.net)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace dataformat_doc;

defined('MOODLE_INTERNAL') || die();

/**
 * doc html data format writer
 *
 * @package    dataformat_doc
 * @copyright  2016 Brendan Heywood (brendan@catalyst-au.net)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class writer extends \core\dataformat\base {

    /** @var $mimetype */
    public $mimetype = "text/html";

    /** @var $extension */
    public $extension = ".doc";

    /**
     * Write the start of the format
     *
     * @param array $columns
     */
    public function write_header($columns) {
        echo "<!DOCTYPE html><html>";
        echo \html_writer::tag('title', $this->filename);
        echo "<style>
html, body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    font-size: 13px;
    background: #eee;
}
th {
    border: solid 1px #999;
    background: #eee;
}
td {
    border: solid 1px #999;
    background: #fff;
}
tr:hover td {
    background: #eef;
}
table {
    border-collapse: collapse;
    border-spacing: 0pt;
    width: 100%;
    margin: auto;
}
</style>
<body>
<table border=1 cellspacing=0 cellpadding=3>
";
        echo \html_writer::start_tag('tr');
        foreach ($columns as $k => $v) {
            echo \html_writer::tag('th', $v);
        }
        echo \html_writer::end_tag('tr');
    }

    /**
     * Write a single record
     *
     * @param array $record
     * @param int $rownum
     */
    public function write_record($record, $rownum) {
        echo \html_writer::start_tag('tr');
        foreach ($record as $cell) {
            echo \html_writer::tag('td', $cell);
        }
        echo \html_writer::end_tag('tr');
    }

    /**
     * Write the end of the format
     *
     * @param array $columns
     */
    public function write_footer($columns) {
        echo "</table></body></html>";
    }

    /***Static methods***/
    public static function write_document_header($title) {
        echo "<!DOCTYPE html><html>";
        echo \html_writer::tag('title', $title);
        echo "<style>
html, body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    font-size: 13px;
    background: #eee;
}
th {
    border: solid 1px #999;
    background: #eee;
}
td {
    border: solid 1px #999;
    background: #fff;
}
tr:hover td {
    background: #eef;
}
table {
    border-collapse: collapse;
    border-spacing: 0pt;
    width: 100%;
    margin: auto;
}
</style>
<body>";
    }

    public static function write_table_header($columns) {
        echo "<table border=1 cellspacing=0 cellpadding=3>";
        echo \html_writer::start_tag('tr');
        foreach ($columns as $k => $v) {
            echo \html_writer::tag('th', $v);
        }
        echo \html_writer::end_tag('tr');
    }
    
    public static function write_div($content) {
        echo \html_writer::tag('div', $content);
    }
    
    public static function write_table_end() {
        echo "</table>";
    }
    
    public static function write_document_end() {
        echo "</body></html>";
    }
}
