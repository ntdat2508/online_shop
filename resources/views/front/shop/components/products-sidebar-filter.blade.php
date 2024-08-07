<form action="{{ request()->segment(2) == 'product' ? 'shop' : '' }}">
    <div class="filter-widget">
        <h4 class="fw-title">Danh mục</h4>
        <ul class="filter-catagories">
            @foreach ($categories as $category)
                <li><a href="shop/category/{{ $category->name }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Nhãn hàng</h4>
        <div class="fw-brand-check">
            @foreach ($brands as $brand)
                <div class="bc-item">
                    <label for="bc-{{ $brand->id }}">
                        {{ $brand->name }}
                        <input type="checkbox" 
                            {{ (request("brand")[$brand->id] ?? '') == 'on' ? 'checked' : '' }}
                            id="bc-{{ $brand->id }}" 
                            name="brand[{{ $brand->id }}]"
                            onchange="this.form.submit();"
                        >
                        <span class="checkmark"></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="filter-widget">
        <div class="fw-title">Màu</div>
        <div class="fw-color-choose">
            <div class="cs-item">
                <input type="checkbox" id="cs-black" 
                        name="color" value="black" 
                        onchange="this.form.submit();" {{ request('color') == 'black' ? 'checked' : '' }}>
                <label for="cs-black" class="cs-black {{ request('color') == 'black' ? 'font-weight-bold' : '' }}">Đen</label>
            </div>
            <div class="cs-item">
                <input type="checkbox" id="cs-violet"
                        name="color" value="violet" 
                        onchange="this.form.submit();" {{ request('color') == 'violet' ? 'checked' : '' }}>
                <label for="cs-violet" class="cs-violet {{ request('color') == 'violet' ? 'font-weight-bold' : '' }}">Tím</label>
            </div>
            <div class="cs-item">
                <input type="checkbox" id="cs-green"
                        name="color" value="green" 
                        onchange="this.form.submit();" {{ request('color') == 'green' ? 'checked' : '' }}>
                <label for="cs-green" class="cs-green {{ request('color') == 'green' ? 'font-weight-bold' : '' }}">Xanh lá</label>
            </div>
            <div class="cs-item">
                <input type="checkbox" id="cs-blue"
                        name="color" value="blue" 
                        onchange="this.form.submit();" {{ request('color') == 'blue' ? 'checked' : '' }}>
                <label for="cs-blue" class="cs-blue {{ request('color') == 'blue' ? 'font-weight-bold' : '' }}">Xanh dương</label>
            </div>
            <div class="cs-item">
                <input type="checkbox" id="cs-red"
                        name="color" value="red" 
                        onchange="this.form.submit();" {{ request('color') == 'red' ? 'checked' : '' }}>
                <label for="cs-red" class="cs-red {{ request('color') == 'red' ? 'font-weight-bold' : '' }}">Đỏ</label>
            </div>
            <div class="cs-item">
                <input type="checkbox" id="cs-yellow"
                        name="color" value="yellow" 
                        onchange="this.form.submit();" {{ request('color') == 'yellow' ? 'checked' : '' }}>
                <label for="cs-yellow" class="cs-yellow {{ request('color') == 'yellow' ? 'font-weight-bold' : '' }}">Vàng</label>
            </div>
            <div class="cs-item">
                <input type="checkbox" id="cs-orange"
                        name="color" value="orange" 
                        onchange="this.form.submit();" {{ request('color') == 'orange' ? 'checked' : '' }}>
                <label for="cs-orange" class="cs-orange {{ request('color') == 'orange' ? 'font-weight-bold' : '' }}">Cam</label>
            </div>
            <div class="cs-item">
                <input type="checkbox" id="cs-white"
                        name="color" value="white" 
                        onchange="this.form.submit();" {{ request('color') == 'white' ? 'checked' : '' }}>
                <label for="cs-white" class="cs-white {{ request('color') == 'white' ? 'font-weight-bold' : '' }}">Trắng</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Size</h4>
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="checkbox" id="s-size" 
                        name="size" value="s" 
                        onchange="this.form.submit();" 
                        {{ request('size') == 's' ? 'checked' : '' }}
                >
                <label for="s-size" class="{{ request('size') == 's' ? 'active' : '' }}">S</label>
            </div>
            <div class="sc-item">
                <input type="checkbox" id="m-size"
                        name="size" value="m" 
                        onchange="this.form.submit();" 
                        {{ request('size') == 'm' ? 'checked' : '' }}
                >
                <label for="m-size" class="{{ request('size') == 'm' ? 'active' : '' }}">M</label>
            </div>
            <div class="sc-item">
                <input type="checkbox" id="l-size"
                        name="size" value="l" 
                        onchange="this.form.submit();" 
                        {{ request('size') == 'l' ? 'checked' : '' }}
                >
                <label for="l-size" class="{{ request('size') == 'l' ? 'active' : '' }}">L</label>
            </div>
            <div class="sc-item">
                <input type="checkbox" id="xl-size"
                        name="size" value="xl" 
                        onchange="this.form.submit();" 
                        {{ request('size') == 'xl' ? 'checked' : '' }}
                >
                <label for="xl-size" class="{{ request('size') == 'xl' ? 'active' : '' }}">XL</label>
            </div>
        </div>
    </div>
</form>