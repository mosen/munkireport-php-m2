Installhistory module
=====================

Gathers installhistory information found in `/Library/Receipts/InstallHistory.plist`

The table provides the following information per 'item':

* id (int) Unique id
* serial_number (string) Serial Number
* date (int) Unix timestamp
* displayName (string) Display name
* displayVersion (string) Display version
* packageIdentifiers (string) Identifiers
* processName (string) Name of installing process

MunkiReport 3 Notes
-------------------

* No longer supports 10.5 and earlier.

