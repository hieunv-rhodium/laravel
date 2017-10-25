<?php

namespace App\Queries\GridQueries;
use App\Queries\GridQueries\Contracts\DataQuery;
use DB;

class userQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('users')
            ->select('id as Id',
                'name as Name',
                'email as Email',
                'is_admin as Admin',
                'status_id as Status',
                'is_subscribed as Subscribed',
                DB::raw('DATE_FORMAT(created_at,
                            "%m-%d-%Y") as Created'))
            ->orderBy($column, $direction)
            ->paginate(10);

        return $rows;


    }

    public function filteredData($column, $direction, $keyword)
    {

        $rows = DB::table('widgets')
            ->select('id as Id',
                'name as Name',
                'email as Email',
                'is_admin as Admin',
                'status_id as Status',
                'is_subscribed as Subscribed',
                DB::raw('DATE_FORMAT(created_at,
                                "%m-%d-%Y") as Created'))
            ->where('name', 'like', '%' . $keyword . '%')
            ->orderBy($column, $direction)
            ->paginate(10);

        return $rows;

    }

}