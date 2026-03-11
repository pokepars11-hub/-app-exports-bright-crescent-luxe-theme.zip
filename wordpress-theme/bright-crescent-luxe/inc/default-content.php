<?php
/**
 * Default complete content mirroring preview.
 *
 * @package bright-crescent-luxe
 */

if (! defined('ABSPATH')) {
    exit;
}

function bct_asset_image(string $filename): string
{
    return get_template_directory_uri() . '/assets/images/' . $filename;
}

function bct_default_news_items(): array
{
    return [
        [
            'title' => 'Bright Crescent Expands Premium Appliance Procurement Network',
            'date' => '2026-01-15',
            'category' => 'Company',
            'excerpt' => 'Our sourcing division now supports broader supply coverage for premium kitchen and lifestyle appliances across GCC markets.',
            'image' => bct_asset_image('news-01.jpg'),
        ],
        [
            'title' => 'Crystal Collections for Hospitality and Luxury Interiors',
            'date' => '2025-12-07',
            'category' => 'Product',
            'excerpt' => 'We introduced curated crystal décor lines inspired by international exhibitions to support hotels, lounges, and high-end residences.',
            'image' => bct_asset_image('news-02.jpg'),
        ],
        [
            'title' => 'Faster Spare Parts Availability for Cooling Systems',
            'date' => '2025-11-26',
            'category' => 'Operations',
            'excerpt' => 'Inventory optimization now improves turnaround for AC and refrigeration spare parts requested by technicians and facility teams.',
            'image' => bct_asset_image('news-03.jpg'),
        ],
        [
            'title' => 'Strategic Vendor Alliances for Long-Term Quality Assurance',
            'date' => '2025-10-13',
            'category' => 'Partnership',
            'excerpt' => 'Bright Crescent reinforces quality checks and compliance standards through strategic partner evaluation and lifecycle testing.',
            'image' => bct_asset_image('news-04.jpg'),
        ],
    ];
}

function bct_default_appliances(): array
{
    return [
        [
            'name' => 'Elite Smart Refrigerator 520L',
            'category' => 'Refrigeration',
            'origin' => 'Germany',
            'specs' => ['Multi-zone cooling', 'Energy-efficient inverter', 'Fingerprint-resistant steel'],
            'image' => bct_asset_image('appliance-01.jpg'),
        ],
        [
            'name' => 'Signature Convection Oven Pro',
            'category' => 'Cooking',
            'origin' => 'Italy',
            'specs' => ['Dual convection', 'Steam-assist baking', 'Soft-close precision doors'],
            'image' => bct_asset_image('appliance-02.jpg'),
        ],
        [
            'name' => 'Premium Front-Load Washer',
            'category' => 'Laundry',
            'origin' => 'Japan',
            'specs' => ['Silent-drive motor', 'Auto-dose detergent', 'Fabric care modes'],
            'image' => bct_asset_image('appliance-03.jpg'),
        ],
        [
            'name' => 'Built-in Wine Chiller',
            'category' => 'Lifestyle',
            'origin' => 'France',
            'specs' => ['UV-protected glass', 'Dual temperature zones', 'Vibration-control system'],
            'image' => bct_asset_image('appliance-04.jpg'),
        ],
        [
            'name' => 'Platinum Dishwasher Series X',
            'category' => 'Cleaning',
            'origin' => 'Sweden',
            'specs' => ['Low water usage', 'Crystal-safe cycle', 'Auto-dry technology'],
            'image' => bct_asset_image('appliance-05.jpg'),
        ],
        [
            'name' => 'Modular Air Purification Tower',
            'category' => 'Air Care',
            'origin' => 'UAE',
            'specs' => ['HEPA H14 filtration', 'Smart sensors', 'Large-space coverage'],
            'image' => bct_asset_image('appliance-06.jpg'),
        ],
    ];
}

function bct_default_crystals(): array
{
    return [
        [
            'name' => 'Aurora Crystal Vase',
            'collection' => 'Home Accessories',
            'material' => 'Lead-free crystal',
            'note' => 'Inspired by contemporary Asian crystal craft trends.',
            'image' => bct_asset_image('crystal-01.jpg'),
        ],
        [
            'name' => 'Celestial Gift Figurine',
            'collection' => 'Gift Customization',
            'material' => 'Hand-cut optical crystal',
            'note' => 'Ideal for executive gifting and premium commemoratives.',
            'image' => bct_asset_image('crystal-02.jpg'),
        ],
        [
            'name' => 'Lumen Hanging Accent',
            'collection' => 'Lighting Fixture',
            'material' => 'Polished faceted crystal',
            'note' => 'Decorative suspended crystal format for interiors.',
            'image' => bct_asset_image('crystal-03.png'),
        ],
        [
            'name' => 'Regal Crystal Bowl',
            'collection' => 'Collection',
            'material' => 'Molded artisan crystal',
            'note' => 'Designed for premium tabletop presentation.',
            'image' => bct_asset_image('crystal-04.png'),
        ],
        [
            'name' => 'Imperial Decorative Orb',
            'collection' => 'Home Accessories',
            'material' => 'K9 optical crystal',
            'note' => 'Statement centerpiece with high clarity and depth.',
            'image' => bct_asset_image('crystal-05.png'),
        ],
        [
            'name' => 'Signature Trophy Form',
            'collection' => 'Gift Customization',
            'material' => 'Precision-engraved crystal',
            'note' => 'Corporate and ceremonial recognition piece.',
            'image' => bct_asset_image('crystal-06.png'),
        ],
    ];
}

function bct_default_spare_parts(): array
{
    return [
        ['name' => 'AC Compressor', 'category' => 'Air Conditioning', 'image' => bct_asset_image('spare-01.webp')],
        ['name' => 'AC Duct', 'category' => 'Air Conditioning', 'image' => bct_asset_image('spare-02.webp')],
        ['name' => 'Cooling Coil', 'category' => 'HVAC', 'image' => bct_asset_image('spare-03.webp')],
        ['name' => 'Fridge Compressor', 'category' => 'Refrigeration', 'image' => bct_asset_image('spare-04.webp')],
        ['name' => 'Fridge Timer', 'category' => 'Refrigeration', 'image' => bct_asset_image('spare-05.webp')],
        ['name' => 'Fridge Thermostat', 'category' => 'Refrigeration', 'image' => bct_asset_image('spare-06.webp')],
        ['name' => 'Washing Machine Pulsator', 'category' => 'Laundry', 'image' => bct_asset_image('spare-07.webp')],
        ['name' => 'Washing Machine Hub', 'category' => 'Laundry', 'image' => bct_asset_image('spare-08.webp')],
        ['name' => 'Washing Machine Gear', 'category' => 'Laundry', 'image' => bct_asset_image('spare-09.webp')],
        ['name' => 'Condenser Fan Motor', 'category' => 'HVAC', 'image' => bct_asset_image('spare-10.webp')],
    ];
}
