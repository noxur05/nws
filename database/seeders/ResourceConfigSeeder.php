<?php

namespace Database\Seeders;

use App\Models\ResourceConfig;
use App\Models\ResourceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourceConfigSeeder extends Seeder
{
    public function run(): void
    {
        $types = ResourceType::all()->keyBy('name');

        $addConfigs = function ($typeName, array $configs) use ($types) {
            foreach ($configs as $cfg) {
                ResourceConfig::create([
                    'type_id' => $types[$typeName]->id,
                    'config' => json_encode($cfg),
                    'price' => fake()->randomFloat(2, 5, 100),
                ]);
            }
        };

        // Cloud Servers
        $addConfigs('Cloud Servers', [
            ['cpu' => 2, 'ram' => '4GB', 'disk' => '50GB SSD'],
            ['cpu' => 4, 'ram' => '8GB', 'disk' => '100GB NVMe'],
            ['cpu' => 8, 'ram' => '16GB', 'disk' => '200GB NVMe', 'backup' => true],
        ]);

        // Bare Metals
        $addConfigs('Bare Metals', [
            ['cpu' => 'Intel Xeon E-2288G', 'ram' => '32GB ECC', 'storage' => '2x1TB SSD', 'network' => '1Gbps'],
            ['cpu' => 'AMD EPYC 7402P', 'ram' => '64GB ECC', 'storage' => '2x2TB NVMe'],
            ['cpu' => 'Intel Xeon Gold 6226R', 'ram' => '128GB', 'storage' => '4x1TB NVMe', 'gpu' => 'NVIDIA A4000'],
        ]);

        // Databases
        $addConfigs('Databases', [
            ['engine' => 'PostgreSQL', 'version' => '15', 'storage' => '50GB', 'replication' => false],
            ['engine' => 'MySQL', 'version' => '8.0', 'storage' => '100GB', 'replication' => true],
            ['engine' => 'MongoDB', 'version' => '6.0', 'storage' => '200GB', 'cluster' => true],
        ]);

        // S3 Storage
        $addConfigs('S3 Storage', [
            ['type' => 'Standard', 'redundancy' => 'High', 'capacity' => '100GB'],
            ['type' => 'Infrequent Access', 'redundancy' => 'Medium', 'capacity' => '1TB'],
            ['type' => 'Archive', 'redundancy' => 'Low', 'capacity' => '5TB'],
        ]);

        // Email
        $addConfigs('Email', [
            ['mailboxes' => 10, 'storage_per_box' => '5GB', 'antivirus' => true],
            ['mailboxes' => 25, 'storage_per_box' => '10GB', 'antispam' => true],
            ['mailboxes' => 50, 'storage_per_box' => '20GB', 'encryption' => 'TLS'],
        ]);

        // Personal Network
        $addConfigs('Personal Network', [
            ['bandwidth' => '1Gbps', 'ipv4' => true, 'firewall' => true],
            ['bandwidth' => '10Gbps', 'ipv6' => true, 'vpn' => true],
            ['bandwidth' => '500Mbps', 'private_lan' => true, 'nat' => true],
        ]);
    }
}
