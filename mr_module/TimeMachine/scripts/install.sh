#!/bin/bash

# servermetrics controller
CTL="${BASEURL}/module/timemachine/"

# Get the scripts in the proper directories
"${CURL[@]}" "${CTL}get_script/timemachine.sh" -o "${MUNKIPATH}preflight.d/timemachine.sh"

# Check exit status of curl
if [ $? = 0 ]; then
	# Make executable
	chmod a+x "${MUNKIPATH}preflight.d/timemachine.sh"

	# Set preference to include this file in the preflight check
	setreportpref "timemachine" "${CACHEPATH}timemachine.txt"

else
	echo "Failed to download all required components!"
	rm -f "${MUNKIPATH}preflight.d/timemachine.sh"

	# Signal that we had an error
	ERR=1
fi
