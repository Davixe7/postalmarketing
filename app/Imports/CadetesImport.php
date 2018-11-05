<?php

namespace App\Imports;

use App\Cadete;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CadetesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    public function model(array $row)
    {
      return new Cadete([
        "cadete_id"   => $row["id"],
        "name"        => $row["recolector"],
        "email"       => $row["email"],
        "status"      => $row["estado"]
      ]);
    }

    public function batchSize():int{
      return 50;
    }

    public function chunkSize():int{
      return 100;
    }
}
