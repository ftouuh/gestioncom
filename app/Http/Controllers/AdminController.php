<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Product;
use App\Models\Client;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function Dashboard()
    {
        if (auth()->check()) {
            $factures = Facture::All();
            $clients = Client::All();
            $pro = Product::All();

            $totalQuantity = 0;

            foreach ($factures as $facture) {
                $products = json_decode($facture->products, true);
       
                foreach ($products as $p) {
                    $totalQuantity += $p[4];
                }
            }
            
            $totalclient =0;
            foreach($clients as $c){
                $totalclient+=1;
            }
            $totalproduit =0;
            foreach($pro as $p){
                
                $totalproduit +=1;
             }
             $today = Carbon::now()->setTimezone(config('app.timezone'))->toDateString();
             $todayfacs = Facture::whereDate('created_at', $today)->count();
          

            return view('admin.dashboard', compact('totalQuantity','totalclient','totalproduit','todayfacs'));
        } else {
            return view('auth.login'); 
        }
    }
}
