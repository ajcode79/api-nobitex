<?php
header('Content-type: application/json');

$srcCurrencies = "btc,usdt,eth,etc,doge,ada,bch,ltc,bnb,eos,xlm,xrp,trx,uni,link,dai,dot,shib,aave,ftm,matic,axs,mana,sand,avax,usdc,gmt,mkr,sol,atom,grt,bat,near,ape,qnt,chz,xmr,egala,busd,algo,hbar,1inch,yfi,flow,snx,enj,crv,fil,wbtc,ldo,dydx,apt,mask,comp,bal,lrc,lpt,ens,sushi,api3,one,glm,pmn,dao,cvc,nmr,storj,snt,ant,zrx,slp,egld,imx,blur,100k_floki,1b_babydoge,1m_nft,1m_btt,t,celr,arb,magic,gmx,band,cvx,ton,ssv,mdt,omg,wld,rdnt,jst,bico,rndr,woo,skl,gal,agix,fet";
$dstCurrencies = "rls,usdt";
$response = json_decode(file_get_contents("https://api.nobitex.ir/market/stats?srcCurrency=$srcCurrencies&dstCurrency=$dstCurrencies"), true);
$currenciesArray = explode(',', $srcCurrencies);

foreach ($currenciesArray as $currency) {
    $PriceToman = $response['stats']["".$currency."-rls"]['latest']/10;
    $PriceUsdt = $response['stats']["".$currency."-usdt"]['latest'];
    $aj[$currency] = [
        'PriceToman' => $PriceToman,
        'PriceUsdt' => $PriceUsdt
    ];
}

echo json_encode($aj, 448);
?>
