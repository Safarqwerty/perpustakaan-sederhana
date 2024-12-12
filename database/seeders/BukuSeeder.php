<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'Belajar Laravel',
            'penulis' => 'John Doe',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2021',
            'stok' => '10',
            'ebook_path' => 'ebooks/belajar_laravel.pdf',
            'cover_path' => 'covers/belajar_laravel.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'Mastering PHP',
            'penulis' => 'Jane Smith',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2020',
            'stok' => '10',
            'ebook_path' => 'ebooks/mastering_php.pdf',
            'cover_path' => 'covers/mastering_php.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'JavaScript for Beginners',
            'penulis' => 'Alice Johnson',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2019',
            'stok' => '10',
            'ebook_path' => 'ebooks/javascript_for_beginners.pdf',
            'cover_path' => 'covers/javascript_for_beginners.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'Python Programming',
            'penulis' => 'Bob Brown',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2018',
            'stok' => '10',
            'ebook_path' => 'ebooks/python_programming.pdf',
            'cover_path' => 'covers/python_programming.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'Java Fundamentals',
            'penulis' => 'Charlie Wilson',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2017',
            'stok' => '10',
            'ebook_path' => 'ebooks/java_fundamentals.pdf',
            'cover_path' => 'covers/java_fundamentals.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'C# Programming',
            'penulis' => 'David Lee',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2016',
            'stok' => '10',
            'ebook_path' => 'ebooks/csharp_programming.pdf',
            'cover_path' => 'covers/csharp_programming.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'Ruby on Rails',
            'penulis' => 'Eva Green',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2015',
            'stok' => '10',
            'ebook_path' => 'ebooks/ruby_on_rails.pdf',
            'cover_path' => 'covers/ruby_on_rails.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'Node.js Essentials',
            'penulis' => 'Frank White',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2014',
            'stok' => '10',
            'ebook_path' => 'ebooks/nodejs_essentials.pdf',
            'cover_path' => 'covers/nodejs_essentials.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'React Native Development',
            'penulis' => 'Grace Brown',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2013',
            'stok' => '10',
            'ebook_path' => 'ebooks/react_native_development.pdf',
            'cover_path' => 'covers/react_native_development.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'Vue.js Handbook',
            'penulis' => 'Henry Johnson',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2012',
            'stok' => '10',
            'ebook_path' => 'ebooks/vuejs_handbook.pdf',
            'cover_path' => 'covers/vuejs_handbook.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'Angular 9',
            'penulis' => 'Irene Wilson',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2011',
            'stok' => '10',
            'ebook_path' => 'ebooks/angular_9.pdf',
            'cover_path' => 'covers/angular_9.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'Docker for Beginners',
            'penulis' => 'Jack Brown',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2010',
            'stok' => '10',
            'ebook_path' => 'ebooks/docker_for_beginners.pdf',
            'cover_path' => 'covers/docker_for_beginners.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'Kubernetes in Action',
            'penulis' => 'Katie Green',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2009',
            'stok' => '10',
            'ebook_path' => 'ebooks/kubernetes_in_action.pdf',
            'cover_path' => 'covers/kubernetes_in_action.jpg',
        ]);

        Buku::create([
            'kode_buku' => '1',
            'nama_buku' => 'AWS Cloud Computing',
            'penulis' => 'Larry Wilson',
            'kategori' => 'cerpen',
            'tahun_rilis' => '2008',
            'stok' => '10',
            'ebook_path' => 'ebooks/aws_cloud_computing.pdf',
            'cover_path' => 'covers/aws_cloud_computing.jpg',
        ]);
    }
}