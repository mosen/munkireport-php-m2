<?php
namespace Mr\CheckIn;


/**
 * The ParsesText trait converts text lines into a Hash for Check-in handlers that deal with data submitted in the form
 *
 * key = value
 * OR
 * key: value
 * 
 * @package Mr\CheckIn
 */
trait ParsesText
{
    /**
     * Parse lines of text into an array structure by splitting key and value from each line.
     * Support separators in the style of " = " or ": ".
     *
     * Lines without the separator are ignored.
     *
     * @param string $text The raw text to parse
     * @param string $separator The character(s) that separate the key from the value. Default is " = ".
     * @param array $keyMap A map of text name => mapped key to translate lines of output.
     * @return array Hash results
     * @throws \Exception When text does not contain any newlines.
     */
    public function parseTextRecord($text, $separator = " = ", $keyMap = []) {
        if (strpos($text, "\n") === false) throw new \Exception("Invalid text to parse, does not contain newlines.");

        $result = [];

        foreach (explode("\n", $text) as $line) {
            if (strpos($line, $separator) === false) continue;

            $kv = explode($separator, $line, 2);
            $value = trim($kv[1]);

            if (array_key_exists($kv[0].$separator, $keyMap)) {
                $key = $keyMap[$kv[0].$separator];
            } else {
                $key = $kv[0];
            }

            $result[$key] = $value;
        }

        return $result;
    }

    /**
     * Generate records from lines of text into an array structure by splitting key and value from each line.
     * Support separators in the style of " = " or ": ".
     * Supports multiple records separated by a separator.
     *
     * Lines without the separator are ignored.
     *
     * @param string $text The raw text to parse
     * @param $recordSeparator
     * @param string $separator The character(s) that separate the key from the value. Default is " = ".
     * @param array $keyMap A map of text name => mapped key to translate lines of output.
     * @return array Hash results
     * @throws \Exception When text does not contain any newlines.
     */
    public function parseTextRecords($text, $recordSeparator, $separator = " = ", $keyMap = []) {
        if (strpos($text, "\n") === false) throw new \Exception("Invalid text to parse, does not contain newlines.");

        $result = [];

        foreach (explode("\n", $text) as $line) {
            if (strpos($line, $recordSeparator) !== false) {
                yield $result;
                $result = [];
            }
            if (strpos($line, $separator) === false) continue;

            $kv = explode($separator, $line, 2);
            $value = trim($kv[1]);

            if (in_array($kv[0].$separator, $keyMap)) {
                $key = $keyMap[$kv[0].$separator];
            } else {
                $key = $kv[0];
            }

            $result[$key] = $value;
        }
    }
}