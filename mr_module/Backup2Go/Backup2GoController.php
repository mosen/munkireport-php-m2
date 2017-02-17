<?php
namespace MrModule\Backup2Go;

use Mr\Http\Controllers\Controller;

class Backup2GoController extends Controller
{
    /**
     * Fetch Backup2Go Statistics
     *
     * @return array
     */
    public function stats() {
        $twoWeeksAgo = new \DateTime();
        $twoWeeksAgo->sub(new \DateInterval('P2W'));

        $monthAgo = new \DateTime();
        $monthAgo->sub(new \DateInterval('P1M'));

        $ok = Backup2Go::where('backupdate', '>', $twoWeeksAgo)->count();
        $warning = Backup2Go::whereBetween('backupdate', [$monthAgo, $twoWeeksAgo])->count();
        $danger = Backup2Go::where('backupdate', '<', $monthAgo)->count();

        return [
            'ok' => $ok,
            'warning' => $warning,
            'danger' => $danger
        ];
    }
}