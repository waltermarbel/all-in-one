<?php

namespace AIO\Data;

class DataConst {
    /**
     * ⚡ Bolt: Cache statically mounted directory paths in memory
     * to avoid redundant `is_dir` and `realpath` filesystem checks during a request.
     */
    private static ?string $dataDirectory = null;
    private static ?string $sessionDirectory = null;

    public static function GetDataDirectory() : string {
        if (self::$dataDirectory !== null) {
            return self::$dataDirectory;
        }

        if(is_dir('/mnt/docker-aio-config/data/')) {
            self::$dataDirectory = '/mnt/docker-aio-config/data/';
        } else {
            self::$dataDirectory = realpath(__DIR__ . '/../../data/');
        }

        return self::$dataDirectory;
    }

    public static function GetSessionDirectory() : string {
        if (self::$sessionDirectory !== null) {
            return self::$sessionDirectory;
        }

        if(is_dir('/mnt/docker-aio-config/session/')) {
            self::$sessionDirectory = '/mnt/docker-aio-config/session/';
        } else {
            self::$sessionDirectory = realpath(__DIR__ . '/../../session/');
        }

        return self::$sessionDirectory;
    }

    public static function GetConfigFile() : string {
        return self::GetDataDirectory() . '/configuration.json';
    }

    public static function GetBackupSecretFile() : string {
        return self::GetDataDirectory() . '/backupsecret';
    }

    public static function GetDailyBackupTimeFile() : string {
        return self::GetDataDirectory() . '/daily_backup_time';
    }

    public static function GetAdditionalBackupDirectoriesFile() : string {
        return self::GetDataDirectory() . '/additional_backup_directories';
    }

    public static function GetDailyBackupBlockFile() : string {
        return self::GetDataDirectory() . '/daily_backup_running';
    }

    public static function GetBackupKeyFile() : string {
        return self::GetDataDirectory() . '/borg.config';
    }

    public static function GetBackupArchivesList() : string {
        return self::GetDataDirectory() . '/backup_archives.list';
    }

    public static function GetSessionDateFile() : string {
        return self::GetDataDirectory() . '/session_date_file';
    }
}
