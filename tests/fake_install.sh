#!/usr/bin/env bash
PLUTIL="/usr/bin/plutil"
MUNKIPATH="/usr/local/munki"
CACHEPATH="${MUNKIPATH}/preflight.d/cache"

${PLUTIL} -insert ReportItems.ard -string /Library/Preferences/com.apple.RemoteDesktop.plist /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.bluetooth -string "${CACHEPATH}/bluetoothinfo.plist" /Library/Preferences/MunkiReport.plist
