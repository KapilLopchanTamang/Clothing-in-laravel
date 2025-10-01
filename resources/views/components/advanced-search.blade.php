<!-- Advanced Search Modal -->
<div class="modal fade" id="advancedSearchModal" tabindex="-1" aria-labelledby="advancedSearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="advancedSearchModalLabel">
                    <i class="fas fa-search me-2"></i>Advanced Search
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="advanced-search-form">
                    <div class="row g-3">
                        <!-- Search Term -->
                        <div class="col-12">
                            <label for="search-term" class="form-label">Search Term</label>
                            <input type="text" class="form-control" id="search-term" placeholder="Enter product name, brand, or description">
                            <div id="search-suggestions" class="list-group mt-2" style="display: none;">
                                <!-- Suggestions will be populated by JavaScript -->
                            </div>
                        </div>
                        
                        <!-- Category -->
                        <div class="col-md-6">
                            <label for="search-category" class="form-label">Category</label>
                            <select class="form-select" id="search-category">
                                <option value="">All Categories</option>
                                <option value="men">Men's Clothing</option>
                                <option value="women">Women's Clothing</option>
                                <option value="shoes">Shoes</option>
                                <option value="bags">Bags</option>
                                <option value="accessories">Accessories</option>
                            </select>
                        </div>
                        
                        <!-- Brand -->
                        <div class="col-md-6">
                            <label for="search-brand" class="form-label">Brand</label>
                            <select class="form-select" id="search-brand">
                                <option value="">All Brands</option>
                                <option value="adidas">Adidas</option>
                                <option value="nike">Nike</option>
                                <option value="chanel">Chanel</option>
                                <option value="zara">Zara</option>
                                <option value="levis">Levi's</option>
                                <option value="rayban">Ray-Ban</option>
                            </select>
                        </div>
                        
                        <!-- Price Range -->
                        <div class="col-12">
                            <label class="form-label">Price Range</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="number" class="form-control" id="min-price" placeholder="Min Price" min="0">
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" id="max-price" placeholder="Max Price" min="0">
                                </div>
                            </div>
                            <div class="mt-2">
                                <input type="range" class="form-range" id="price-range" min="0" max="1000" value="500" oninput="updatePriceRange(this.value)">
                                <div class="d-flex justify-content-between">
                                    <small class="text-muted">$0</small>
                                    <small class="text-muted">$1000+</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Size -->
                        <div class="col-md-6">
                            <label class="form-label">Size</label>
                            <div class="d-flex flex-wrap gap-1">
                                <button type="button" class="btn btn-outline-secondary btn-sm size-filter" data-size="XS">XS</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm size-filter" data-size="S">S</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm size-filter" data-size="M">M</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm size-filter" data-size="L">L</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm size-filter" data-size="XL">XL</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm size-filter" data-size="XXL">XXL</button>
                            </div>
                        </div>
                        
                        <!-- Color -->
                        <div class="col-md-6">
                            <label class="form-label">Color</label>
                            <div class="d-flex flex-wrap gap-1">
                                <button type="button" class="btn btn-outline-secondary btn-sm color-filter" data-color="black" style="background-color: black; color: white;">Black</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm color-filter" data-color="white" style="background-color: white; color: black; border: 1px solid #ddd;">White</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm color-filter" data-color="blue" style="background-color: blue; color: white;">Blue</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm color-filter" data-color="red" style="background-color: red; color: white;">Red</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm color-filter" data-color="green" style="background-color: green; color: white;">Green</button>
                            </div>
                        </div>
                        
                        <!-- Rating -->
                        <div class="col-12">
                            <label class="form-label">Minimum Rating</label>
                            <div class="d-flex align-items-center gap-2">
                                <input type="range" class="form-range flex-fill" id="rating-range" min="1" max="5" value="1" oninput="updateRatingDisplay(this.value)">
                                <div class="rating-display">
                                    <span id="rating-stars"></span>
                                    <span id="rating-text" class="ms-2 text-muted">1+ stars</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Availability -->
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="in-stock-only">
                                <label class="form-check-label" for="in-stock-only">
                                    Show only in-stock items
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline-primary" onclick="clearAdvancedSearch()">Clear All</button>
                <button type="button" class="btn btn-primary" onclick="performAdvancedSearch()">
                    <i class="fas fa-search me-2"></i>Search
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.size-filter.active, .color-filter.active {
    background-color: #4A90E2 !important;
    border-color: #4A90E2 !important;
    color: white !important;
}

.search-suggestion {
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.search-suggestion:hover {
    background-color: #f8f9fa;
}

.rating-display {
    min-width: 120px;
}
</style>

<script>
class AdvancedSearch {
    constructor() {
        this.suggestions = [
            'adidas polo shirt',
            'nike air max',
            'chanel handbag',
            'zara summer dress',
            'ray-ban sunglasses',
            'levis jeans',
            'black t-shirt',
            'white sneakers',
            'blue jacket',
            'red dress'
        ];
        this.init();
    }

    init() {
        this.bindEvents();
        this.updateRatingDisplay(1);
    }

    bindEvents() {
        // Search suggestions
        const searchInput = document.getElementById('search-term');
        searchInput.addEventListener('input', (e) => {
            this.showSuggestions(e.target.value);
        });

        // Size and color filters
        document.querySelectorAll('.size-filter, .color-filter').forEach(btn => {
            btn.addEventListener('click', function() {
                this.classList.toggle('active');
            });
        });

        // Hide suggestions when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('#search-term') && !e.target.closest('#search-suggestions')) {
                document.getElementById('search-suggestions').style.display = 'none';
            }
        });
    }

    showSuggestions(query) {
        const suggestionsContainer = document.getElementById('search-suggestions');
        
        if (query.length < 2) {
            suggestionsContainer.style.display = 'none';
            return;
        }

        const filteredSuggestions = this.suggestions.filter(suggestion => 
            suggestion.toLowerCase().includes(query.toLowerCase())
        );

        if (filteredSuggestions.length === 0) {
            suggestionsContainer.style.display = 'none';
            return;
        }

        suggestionsContainer.innerHTML = filteredSuggestions.map(suggestion => `
            <div class="list-group-item search-suggestion" onclick="selectSuggestion('${suggestion}')">
                <i class="fas fa-search me-2 text-muted"></i>${suggestion}
            </div>
        `).join('');

        suggestionsContainer.style.display = 'block';
    }

    updateRatingDisplay(rating) {
        const stars = document.getElementById('rating-stars');
        const text = document.getElementById('rating-text');
        
        stars.innerHTML = Array.from({length: 5}, (_, i) => 
            `<i class="fas fa-star ${i < rating ? 'text-warning' : 'text-muted'}"></i>`
        ).join('');
        
        text.textContent = `${rating}+ stars`;
    }
}

function updatePriceRange(value) {
    document.getElementById('max-price').value = value;
}

function updateRatingDisplay(value) {
    window.advancedSearch.updateRatingDisplay(value);
}

function selectSuggestion(suggestion) {
    document.getElementById('search-term').value = suggestion;
    document.getElementById('search-suggestions').style.display = 'none';
}

function clearAdvancedSearch() {
    document.getElementById('advanced-search-form').reset();
    document.querySelectorAll('.size-filter, .color-filter').forEach(btn => {
        btn.classList.remove('active');
    });
    updateRatingDisplay(1);
}

function performAdvancedSearch() {
    const form = document.getElementById('advanced-search-form');
    const formData = new FormData(form);
    
    // Get selected sizes and colors
    const selectedSizes = Array.from(document.querySelectorAll('.size-filter.active')).map(btn => btn.dataset.size);
    const selectedColors = Array.from(document.querySelectorAll('.color-filter.active')).map(btn => btn.dataset.color);
    
    // Build search parameters
    const params = new URLSearchParams();
    
    if (formData.get('search-term')) params.append('search', formData.get('search-term'));
    if (formData.get('search-category')) params.append('category', formData.get('search-category'));
    if (formData.get('search-brand')) params.append('brand', formData.get('search-brand'));
    if (formData.get('min-price')) params.append('min_price', formData.get('min-price'));
    if (formData.get('max-price')) params.append('max_price', formData.get('max-price'));
    if (selectedSizes.length) params.append('sizes', selectedSizes.join(','));
    if (selectedColors.length) params.append('colors', selectedColors.join(','));
    if (formData.get('rating-range')) params.append('min_rating', formData.get('rating-range'));
    if (document.getElementById('in-stock-only').checked) params.append('in_stock', '1');
    
    // Redirect to shop with search parameters
    window.location.href = `/shop?${params.toString()}`;
    
    // Close modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('advancedSearchModal'));
    modal.hide();
}

// Initialize advanced search
const advancedSearch = new AdvancedSearch();
</script>

