#!/usr/bin/env bash
PLUTIL="/usr/bin/plutil"
MUNKIPATH="/usr/local/munki"
CACHEPATH="${MUNKIPATH}/preflight.d/cache"
SCRIPTS="${MUNKIPATH}/preflight.d"
MODULEDIR=$(PWD)/mr_module

${PLUTIL} -insert ReportItems.ard -string /Library/Preferences/com.apple.RemoteDesktop.plist /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.bluetooth -string "${CACHEPATH}/bluetoothinfo.plist" /Library/Preferences/MunkiReport.plist
cp ${MODULEDIR}/Bluetooth/scripts/bluetooth.py ${SCRIPTS}

${PLUTIL} -remove ReportItems.certificate /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.certificate -string "${CACHEPATH}/certificate.txt" /Library/Preferences/MunkiReport.plist
cp ${MODULEDIR}/Certificate/scripts/cert_check ${SCRIPTS}
chmod a+x ${SCRIPTS}/cert_check

${PLUTIL} -remove ReportItems.directory_service /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.directory_service -string "${CACHEPATH}/directoryservice.txt" /Library/Preferences/MunkiReport.plist
cp ${MODULEDIR}/DirectoryService/scripts/directoryservice.sh ${SCRIPTS}
chmod a+x ${SCRIPTS}/directoryservice.sh

${PLUTIL} -remove ReportItems.disk_report /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.disk_report -string "${CACHEPATH}/disk.plist" /Library/Preferences/MunkiReport.plist

${PLUTIL} -remove ReportItems.displays_info /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.displays_info -string "${CACHEPATH}/displays.txt" /Library/Preferences/MunkiReport.plist
cp ${MODULEDIR}/Display/scripts/displays.py ${SCRIPTS}

${PLUTIL} -remove ReportItems.installhistory /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.installhistory -string "/Library/Receipts/InstallHistory.plist" /Library/Preferences/MunkiReport.plist

${PLUTIL} -remove ReportItems.localadmin /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.localadmin -string "${CACHEPATH}/localadmins.txt" /Library/Preferences/MunkiReport.plist


${PLUTIL} -remove ReportItems.munkiinfo /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.munkiinfo -string "${CACHEPATH}/munkiinfo.plist" /Library/Preferences/MunkiReport.plist
cp ${MODULEDIR}/MunkiInfo/scripts/munkiinfo.py ${SCRIPTS}


${PLUTIL} -remove ReportItems.network /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.network -string "${CACHEPATH}/networkinfo.txt" /Library/Preferences/MunkiReport.plist
cp ${MODULEDIR}/Network/scripts/networkinfo.sh ${SCRIPTS}
chmod a+x ${SCRIPTS}/networkinfo.sh

${PLUTIL} -remove ReportItems.printer /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.printer -string "${CACHEPATH}/printer.txt" /Library/Preferences/MunkiReport.plist
cp ${MODULEDIR}/Printer/scripts/printer.py ${SCRIPTS}

${PLUTIL} -remove ReportItems.profile /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.profile -string "${CACHEPATH}/profile.txt" /Library/Preferences/MunkiReport.plist
cp ${MODULEDIR}/Profile/scripts/profile.py ${SCRIPTS}

${PLUTIL} -remove ReportItems.power /Library/Preferences/MunkiReport.plist
${PLUTIL} -insert ReportItems.power -string "${CACHEPATH}/powerinfo.txt" /Library/Preferences/MunkiReport.plist
cp ${MODULEDIR}/Power/scripts/power.sh ${SCRIPTS}
chmod a+x ${SCRIPTS}/power.sh

