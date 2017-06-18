#!/bin/bash

# filevault_status_controller
NW_CTL="${BASEURL}/module/network/"

# Get the script in the proper directory
"${CURL[@]}" "${NW_CTL}get_script/networkinfo.sh" -o "${MUNKIPATH}preflight.d/networkinfo.sh"

if [ "${?}" != 0 ]
then
	echo "Failed to download all required components!"
	rm -f ${MUNKIPATH}preflight.d/networkinfo.sh
	exit 1
fi

# Make executable
chmod a+x "${MUNKIPATH}preflight.d/networkinfo.sh"

# Set preference to include this file in the preflight check
setreportpref "network" "${CACHEPATH}networkinfo.txt"
