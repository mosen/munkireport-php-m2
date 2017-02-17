<?php
namespace Mr\Module;

use Illuminate\Support\Collection;

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
     * @var null|string Path to the module root, used to resolve non-code resources.
     */
    protected $path = null;
    
    /**
     * @var array An array of scripts used to install this module.
     */
    protected $installScripts = [];

    /**
     * @var array An array of scripts used to uninstall the module.
     */
    protected $uninstallScripts = [];

    /**
     * Metadata constructor.
     * 
     * @param string $moduleName The short name of the module as per the check-in key.
     * @param string $modulePath The directory where the module is installed. Used to calculate paths to non-code assets.
     */
    public function __construct($moduleName, $modulePath) {
        $this->name = $moduleName;
        $this->path = $modulePath;
    }

    /**
     * Get the module short name.
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get the module root path.
     *
     * @return null|string
     */
    public function getPath() {
        return $this->path;
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
     * Get a list of install scripts for this module.
     *
     * @param bool $relative Return path relative to scripts directory only. Default is false.
     * @return array
     */
    public function getInstalls($relative = false) {
        if ($relative) {
            return $this->installScripts;
        } else {
            $scripts = [];
            foreach ($this->installScripts as $script) {
                $scripts[] = $this->path . DIRECTORY_SEPARATOR . $script;
            }
            return $scripts;
        }
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

    // TODO: DRY
    public function getUninstalls($relative = false) {
        if ($relative) {
            return $this->uninstallScripts;
        } else {
            $scripts = [];
            foreach ($this->uninstallScripts as $script) {
                $scripts[] = $this->path . DIRECTORY_SEPARATOR . $script;
            }
            return $scripts;
        }
    }

}