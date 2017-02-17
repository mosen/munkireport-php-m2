<?php
namespace Mr\Module;


/**
 * The Metadata class contains information about an extension module.
 *
 * It is used by the application to read installer and uninstaller scripts from module directories.
 *
 * @package Mr\Module
 */
class Metadata
{
    /**
     * @var string The name of the registered module, this must be the same as the checkin key.
     */
    protected $name = 'undefined';

    /**
     * @var array An array of scripts used to install this module.
     */
    protected $installScripts = [];

    /**
     * @var array An array of scripts used to uninstall the module.
     */
    protected $uninstallScripts = [];

    public function __construct($moduleName) {
        $this->name = $moduleName;
    }

    /**
     * Add an installer script to this module.
     *
     * @param string $scriptName Name of the script eg. install.sh
     * @return $this
     */
    public function installs($scriptName) {
        $this->installScripts[] = $scriptName;
        return $this;
    }

    /**
     * Add an uninstaller script to this module.
     *
     * @param string $scriptName Name of the script eg. uninstall.sh
     * @return $this
     */
    public function uninstalls($scriptName) {
        $this->uninstallScripts[] = $scriptName;
        return $this;
    }

}