#!/bin/bash
##this script will backup mysql and upload it to google drive
##directory name
dirname=$1;
##database name
database=$2;
##database username
dbuser=$3;
##database password
dbpass=$4;
## rclone remote name
rcloneRemoteName=$5;
##google drive folder name
gdrivefoldername=$6;
##condition to check folder exist or not
if [ ! -d "$dirname" ]
then
    ##create directory
    mkdir ./$dirname
    ##dump mysql database on server
    Stime=$(date +\%Y_\%m_\%d_\%H_\%M)
    mysqldump -u $dbuser -p$dbpass $database | gzip>"./$dirname/$database($Stime).sql.gz"
    ##wait for 10 seconds
    sleep 10
    ##upload it to google drive
    rclone copy "./$dirname/$database($Stime).sql.gz" $rcloneRemoteName:$gdrivefoldername
    ##if folder already exist
else
    Btime=$(date +\%Y-\%m-\%d-\%H-\%M)
    ##dump mysql database on server
    mysqldump -u $dbuser -p$dbpass $database | gzip>"./$dirname/$database($Btime).sql.gz"  
     ##wait for 10 seconds
    sleep 10
    ##upload it to google drive
    ## you can add optional --connfig rclone
    rclone copy "./$dirname/$database($Btime).sql.gz" $rcloneRemoteName:$gdrivefoldername
    ##delete 10 days older file on server to save disk space(this command is optional)
    find ./$dirname -mtime +1 -type f -delete
fi
exit 0;
