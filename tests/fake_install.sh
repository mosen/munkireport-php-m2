#!/usr/bin/env bash
PLUTIL="/usr/bin/plutil"
MUNKIPATH="/usr/local/munki"
CACHEPATH="${MUNKIPATH}/preflight.d/cache"

${PLUTIL} -insert ReportItems.ard -string /Library/Preferences/com.apple.RemoteDesktop.plist /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.bluetooth -string "${CACHEPATH}/bluetoothinfo.plist" /Library/Preferences/MunkiReport.plist

${PLUTIL} -remove ReportItems.certificate /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.certificate -string "${CACHEPATH}/certificate.txt" /Library/Preferences/MunkiReport.plist

${PLUTIL} -remove ReportItems.directory_service /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.directory_service -string "${CACHEPATH}/directoryservice.txt" /Library/Preferences/MunkiReport.plist

${PLUTIL} -remove ReportItems.disk_report /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.disk_report -string "${CACHEPATH}/disk.plist" /Library/Preferences/MunkiReport.plist
