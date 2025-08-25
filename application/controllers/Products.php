<?php

namespace App\Controllers;
use App\Models\TshirtModel;

class Products extends BaseController
{
    // Show the T-shirt builder
    public function builder()
    {
        $m = new TshirtModel();
        return view('builder', [
            'colors'  => $m->colors(),
            'designs' => $m->designs(),
            'fonts'   => $m->fonts(),
        ]);
    }

    // Add customized T-shirt to cart
    public function addToCart()
    {
        $req = $this->request->getPost();

        // Validation: must choose color + (design OR text)
        if (empty($req['color_id']) || (empty($req['design_id']) && trim($req['custom_text']) === '')) {
            return redirect()->back()->with('error', 'Please select a design or enter custom text.')->withInput();
        }

        $m = new TshirtModel();
        $color  = $m->findColor((int)$req['color_id']);
        $design = !empty($req['design_id']) ? $m->findDesign((int)$req['design_id']) : null;
        $font   = !empty($req['font_id'])   ? $m->findFont((int)$req['font_id'])     : null;

        // Simple pricing rules
        $price = 499;
        if ($design) $price += 100;
        if (trim($req['custom_text']) !== '') $price += 50;

        // Cart item structure
        $item = [
            'color_id'    => (int)$req['color_id'],
            'design_id'   => $design['id'] ?? null,
            'custom_text' => trim($req['custom_text'] ?? ''),
            'font_id'     => $font['id'] ?? null,
            'price'       => $price,
            'color'       => $color,
            'design'      => $design,
            'font'        => $font,
        ];

        // Save to session
        $session = session();
        $cart = $session->get('cart') ?? [];
        $cart[] = $item;
        $session->set('cart', $cart);

        return redirect()->to('/cart');
    }

    // Show cart page
    public function cart()
    {
        return view('cart', ['items' => session()->get('cart') ?? []]);
    }
    public function clearCart()
{
    session()->remove('cart');
    return redirect()->to('/cart');
}

}
