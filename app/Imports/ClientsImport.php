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
    $client = Client::where('client_id', '=', $row['identificacion'])->exists();
    if( !$client ){
      return new Client([
        "client_id" => $row["identificacion"],
        "name"      => $row["nombre_cliente"],
        "email"     => $row["email"],
        "email_2"   => $row["email2"],
        "address"   => $row["direccion"],
        "cp"        => $row["codigo_postal"]
      ]);
    }
  }

  public function batchSize():int{
    return 1;
  }

  public function chunkSize():int{
    return 100;
  }
}
