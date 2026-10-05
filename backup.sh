#!/bin/bash
# Digileo Tech Solutions - Backup Script
# Usage: ./backup.sh [output_directory]

BACKUP_DIR="${1:-../backups}"
TIMESTAMP=$(date +%Y%m%d_%H%M%S)
BACKUP_NAME="digileo_backup_${TIMESTAMP}"
PROJECT_DIR="$(dirname "$0")"

mkdir -p "$BACKUP_DIR"

# Create archive excluding logs, uploads, and vendor
tar -czf "${BACKUP_DIR}/${BACKUP_NAME}.tar.gz" \
  --exclude="logs/*" \
  --exclude="uploads/*" \
  --exclude="vendor" \
  --exclude="node_modules" \
  --exclude=".git" \
  -C "$PROJECT_DIR" .

echo "Backup created: ${BACKUP_DIR}/${BACKUP_NAME}.tar.gz"
echo "Size: $(du -h "${BACKUP_DIR}/${BACKUP_NAME}.tar.gz" | cut -f1)"
