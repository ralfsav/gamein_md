#!/bin/bash
while true; do
	echo "Please input date <YYYYMMDD>: "
	read date
	if [ -z "$(date -d "$date" +%Y%m%d  2>/dev/null)" ]; then
		echo $date "Date is invalid"
	else
		dirPath="/c/Users/Ralfs/$date-bash/output"
		if [ -d "$dirPath" ]; then
			echo "Directory already exists, will rsync the existing one"
		else
			echo $dirPath
			mkdir -p "$dirPath"
		fi
		break
	fi
done

echo "rsync everything from folder "data" to "output""
rsync -vr /c/data $dirPath
