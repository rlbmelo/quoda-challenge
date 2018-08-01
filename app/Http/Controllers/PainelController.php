<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DOMDocument;
use DomXPath;

class PainelController extends Controller{

    public function index($uf = NULL){


        $url_ssp_df = 'http://licitacoes.ssp.df.gov.br./index.php/licitacoes/cat_view/1-licitacoes/2-pregao-eletronico';

        $html_ssp_df = file_get_contents($url_ssp_df);


        $dom = new DOMDocument();
        $dom->loadHTML($html_ssp_df); 
        $xpath = new DOMXPath($dom);
        $licitacoes_ssp_df = $xpath->query('//h3[@class="dm_title"]//a');
        
        foreach ($licitacoes_ssp_df as $objeto_ssp_df){
            $objetos_licitacoes_ssp[] = array(
                'objeto'    => $objeto_ssp_df->textContent,
                'link'      => 'http://licitacoes.ssp.df.gov.br.'.$objeto_ssp_df->getAttribute("href")
            );
        }




        $url_selic_df = 'http://selic.com.br/sistema/sinopses-home-regiao.php?uf=DF';
        $html_selic_df = file_get_contents($url_selic_df);

        libxml_use_internal_errors(true);

        $dom = new DOMDocument();
        $dom->loadHTML($html_selic_df); 
        $xpath = new DOMXPath($dom);
        $licitacoes_selic_df = $xpath->query('//td[@class="objeto"]//a');

        foreach ($licitacoes_selic_df as $objeto_selic_df){
            $objetos_licitacoes_df[] = array(
                'objeto' => $objeto_selic_df->textContent,
                'link' => 'http://selic.com.br/sistema/'.$objeto_selic_df->getAttribute("href")
            ); 

        }


        $data['licitacoes_ssp_df'] = $objetos_licitacoes_ssp;
        $data['licitacoes_df'] = $objetos_licitacoes_df;


        return view('Painel', $data);
    }


}
