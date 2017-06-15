#!/bin/bash

# disk_report controller
DR_CTL="${BASEURL}/module/disk_report/"

# Get the scripts in the proper directories
"${CURL[@]}" "${DR_CTL}get_script/disk_info" -o "${MUNKIPATH}preflight.d/disk_info.py"

# Check exit status of curl
if [ $? = 0 ]; then
	# Make executable
	chmod a+x "${MUNKIPATH}preflight.d/disk_info.py"

	# Set preference to include this file in the preflight check
	setreportpref "disk_report" "${CACHEPATH}disk.plist"

else
	echo "Failed to download all required components!"
	rm -f "${MUNKIPATH}preflight.d/disk_info.py"
	ERR=1
fi


