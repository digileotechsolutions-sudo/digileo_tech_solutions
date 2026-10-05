#!/bin/bash
# Digileo Tech Solutions - Restore Script
# Usage: ./restore.sh <backup_file.tar.gz>

if [ -z "$1" ]; then
  echo "Error: No backup file specified."
  echo "Usage: ./restore.sh ../backups/digileo_backup_20240101_120000.tar.gz"
  exit 1
fi

if [ ! -f "$1" ]; then
  echo "Error: Backup file '$1' not found."
  exit 1
fi

PROJECT_DIR="$(dirname "$0")"
echo "Restoring backup: $1"
echo "Target directory: $PROJECT_DIR"
echo ""
read -p "This will overwrite existing files. Continue? (y/N): " CONFIRM

if [ "$CONFIRM" != "y" ] && [ "$CONFIRM" != "Y" ]; then
  echo "Restore cancelled."
  exit 0
fi

tar -xzf "$1" -C "$PROJECT_DIR"

echo "Restore complete!"
echo "Note: Database must be restored separately if needed."
echo "To restore database: mysql -u USER -p digileo_chat < backup.sql"
