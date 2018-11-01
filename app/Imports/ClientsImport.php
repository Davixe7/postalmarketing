<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class ClientsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
  public function model(array $row)
  {
    return new Client([
      "name" => $row["apellidonombre"],
      "email" => $row["email_inst"],
      "tel" => $row["telefonoparticularins"],
      "address" => $row["direccionins"],
      "x" => $row["x"],
      "y" => $row["y"]
    ]);
  }

  public function batchSize():int{
    return 50;
  }

  public function chunkSize():int{
    return 100;
  }
}
