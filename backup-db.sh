#!/bin/bash

# Configuration
DB_IP="10.242.11.117"
DB_USER="compro_sena"
DB_PASSWORD="Compro123@"
DB_NAME="ptsenaco_ptsena"
BACKUP_DIR="/var/www/compro_sena_admin1/backup-db"
DATE=$(date +"%Y-%m-%d_%H-%M-%S")
BACKUP_FILE="$BACKUP_DIR/${DB_NAME}_backup_$DATE.sql"

# Create backup directory if it doesn't exist
# mkdir -p "$BACKUP_DIR"

# Run the mysqldump command
mysqldump -h "$DB_IP" -u "$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" > "$BACKUP_FILE"

# Optional: compress the backup
# gzip "$BACKUP_FILE"

# sudo mv "$BACKUP_DIR"/* /mnt/011sf015/apps-timesheet/db/

# Output the result
# echo "Backup completed: $BACKUP_FILE.gz"