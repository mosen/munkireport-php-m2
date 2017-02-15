#!/usr/bin/env bash
PLUTIL="/usr/bin/plutil"

${PLUTIL} -insert ReportItems.ard -string /Library/Preferences/com.apple.RemoteDesktop.plist /Library/Preferences/MunkiReport.plist
