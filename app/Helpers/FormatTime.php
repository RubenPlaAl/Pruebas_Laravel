<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class FormatTime {
 
    public static function LongTimeFilter($date) {
        if ($date == null) {
            return __("Without date");
        }
 
        $start_date = $date;
        $since_start = $start_date->diff(new \DateTime(date("Y-m-d") . " " . date("H:i:s")));
 
        if ($since_start->y == 0) {
            if ($since_start->m == 0) {
                if ($since_start->d == 0) {
                    if ($since_start->h == 0) {
                        if ($since_start->i == 0) {
                            if ($since_start->s == 0) {
                                $result = $since_start->s . ' ' . __("seconds ago");
                            } else {
                                if ($since_start->s == 1) {
                                    $result = $since_start->s . ' ' . __("second ago");
                                } else {
                                    $result = $since_start->s . ' ' . __("seconds ago");
                                }
                            }
                        } else {
                            if ($since_start->i == 1) {
                                $result = $since_start->i . ' ' . __("minute ago");
                            } else {
                                $result = $since_start->i . ' ' . __("minutes ago");
                            }
                        }
                    } else {
                        if ($since_start->h == 1) {
                            $result = $since_start->h . ' ' . __("hour ago");
                        } else {
                            $result = $since_start->h . ' ' . __("hours ago");
                        }
                    }
                } else {
                    if ($since_start->d == 1) {
                        $result = $since_start->d . ' ' . __("day ago");
                    } else {
                        $result = $since_start->d . ' ' . __("days ago");
                    }
                }
            } else {
                if ($since_start->m == 1) {
                    $result = $since_start->m . ' ' . __("month ago");
                } else {
                    $result = $since_start->m . ' ' . __("months ago");
                }
            }
        } else {
            if ($since_start->y == 1) {
                $result = $since_start->y . ' ' . __("year ago");
            } else {
                $result = $since_start->y . ' ' . __("years ago");
            }
        }
 
        return __("Since ") . $result;
    }
}
