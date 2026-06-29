<?php

namespace AIO\Data;

class DataConst {
    /**
     * ⚡ Bolt: Cache static directory paths to avoid repeated is_dir()
     * and realpath() filesystem calls during a request lifecycle.
     */
    private static ?string $dataDirectoryCache = null;
    private static ?string $sessionDirectoryCache = null;

    public static function GetDataDirectory() : string {
        if (self::$dataDirectoryCache !== null) {
            return self::$dataDirectoryCache;
        }

        if(is_dir('/mnt/docker-aio-config/data/')) {
            self::$dataDirectoryCache = '/mnt/docker-aio-config/data/';
        } else {
            self::$dataDirectoryCache = realpath(__DIR__ . '/../../data/');
        }

        return self::$dataDirectoryCache;
    }

    public static function GetSessionDirectory() : string {
        if (self::$sessionDirectoryCache !== null) {
            return self::$sessionDirectoryCache;
        }

        if(is_dir('/mnt/docker-aio-config/session/')) {
            self::$sessionDirectoryCache = '/mnt/docker-aio-config/session/';
        } else {
            self::$sessionDirectoryCache = realpath(__DIR__ . '/../../session/');
        }

        return self::$sessionDirectoryCache;
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
