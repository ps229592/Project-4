<div class="p-6">
    <div class="flex font-bold text-xl">Products</div>
        @foreach ($products as $product)
            <form action="{{ route('cart.add', [$product->id]) }}">
                <div class="grid grid-cols-1 md:grid-cols-5">
                    <div class="py-6 flex items-center">{{ $product->name }}</div>
                    <div class="py-6 flex items-center">€ {{ number_format($product->price, 2) }}</div>
                    <div class="py-6 flex items-center">
                        <select name="size" id="size">
                            <option value="25">(25 cm) Small -€ 1,50</option>
                            <option value="29" selected>(29 cm) Medium</option>
                            <option value="35">(35 cm) Large +€ 1,50</option>
                            <option value="40">(40 cm) XXL +€ 3,00</option>
                        </select>
                    </div>
                    <div class="py-6 flex items-center">
                        <select class="w-full" name="ingredients[]" id="ingredients" multiple>
                            @foreach ($ingredients as $ingredient)
                                <option value="{{ $ingredient->id }}" @if ($product->ingredients->contains($ingredient)) selected @endif >{{ $ingredient->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="py-6 flex items-center"><input type="submit" value="Add to cart" class="btn m-6 h-10"></div>
                    
            </form>
    </div>
    @endforeach
</div>
