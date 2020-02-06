<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = ['judul','slug','deskripsi','foto','user_id','kategori_id'];
    public $timestamps = true;

    public function kategori()
    {
        //data Model 'Artikel' bisa dimiliki oleh Model 'kategori'
        //melaui 'kategori_id'
        return $this->belongsTo('App\kategori', 'kategori_id');
    }

    public function user()
    {
        //data Model 'Artikel'Bisa dimiliki oleh model'User'
        //melalui 'kategori_id'
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tag()
    {
        // Model tag memiliki relasi Many to Many
        //(belongsToMany) terhadap model 'Artikel' yanng terhubung oleh
        //table 'artikel_tag' masing-masing sebagai 'artikel_id' dan tag_id
        return $this->belongsToMany('App\Tag','artikel_tag','artikel_id','tag_id');
    }
}
