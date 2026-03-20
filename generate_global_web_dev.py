import os
import glob
import re

def get_unique_locations(directory):
    """Extracts unique locations from *-in-*.php files in a directory."""
    locations = set()
    files = glob.glob(os.path.join(directory, "*-in-*.php"))
    for f in files:
        basename = os.path.basename(f)
        match = re.search(r"-in-([a-z0-9-]+)\.php", basename)
        if match:
            locations.add(match.group(1))
    return sorted(list(locations))

def generate_pages_for_country(country_dir, locations, services, template_path, is_india=False):
    """Generates pages for each service and location in a country."""
    if not os.path.exists(template_path):
        print(f"Template not found: {template_path}")
        return

    with open(template_path, 'r', encoding='utf-8') as f:
        template_content = f.read()

    # Identify base location from template (e.g., "delhi" or "victoria")
    template_basename = os.path.basename(template_path)
    base_location_match = re.search(r"-in-([a-z0-9-]+)\.php", template_basename)
    if not base_location_match:
        print(f"Could not identify base location in {template_basename}")
        return
    base_loc_kebab = base_location_match.group(1)
    base_loc_display = base_loc_kebab.replace('-', ' ').title()

    count = 0
    for loc_kebab in locations:
        loc_display = loc_kebab.replace('-', ' ').title()
        
        for svc_slug, svc_data in services.items():
            target_filename = f"{svc_slug}-in-{loc_kebab}.php"
            target_path = os.path.join(country_dir, target_filename)

            # Skip if already exists (unless it's a specific folder where we want to overwrite/update)
            # if os.path.exists(target_path):
            #     continue

            content = template_content
            
            # 1. Replace Location (Case Sensitive)
            content = content.replace(base_loc_display, loc_display)
            content = content.replace(base_loc_kebab, loc_kebab)

            # 2. Refined Service Replacement (Order matters: longest phrases first)
            replacements = [
                ("Website Development Agency", svc_data['display']),
                ("Web Development Agency", svc_data['display']),
                ("Website Development", svc_data['display'].replace(" Agency", "")),
                ("Web Development", svc_data['display'].replace(" Agency", "")),
                ("web-development", svc_slug)
            ]
            
            for old, new in replacements:
                content = content.replace(old, new)

            # 3. Consolidate redundancies (e.g., "Agency Agency", "Ecommerce Ecommerce")
            content = re.sub(r'(Agency\s+)+Agency', 'Agency', content)
            content = re.sub(r'(Ecommerce\s+)+Ecommerce', 'Ecommerce', content)
            content = re.sub(r'(WordPress\s+)+WordPress', 'WordPress', content)
            content = re.sub(r'(Web Development\s+)+Web Development', 'Web Development', content)
            
            # Clean up URL slugs (e.g., "agency-agency-agency-agency")
            content = re.sub(r'(-agency)+-agency', '-agency', content)
            content = re.sub(r'(-website-development)+-website-development', '-website-development', content)
            content = re.sub(r'(-web-development)+-web-development', '-web-development', content)

            # 4. Special handling for H1 and Meta if needed (already covered by global replace usually)
            
            # 4. Update internal links in the grid if any (very specific to Cognivic templates)
            # Find the grid section and update its links to point to the current service
            if "<!-- STATE_CITIES_LOCATION_GRID_START -->" in content:
                # This is more complex, for now global replace covers most of it.
                pass

            # Ensure the directory exists
            os.makedirs(os.path.dirname(target_path), exist_ok=True)

            with open(target_path, 'w', encoding='utf-8') as f:
                f.write(content)
            count += 1
            
    print(f"Generated {count} pages for {country_dir if country_dir != '.' else 'India'}")

# Define Services
SERVICES = {
    "web-development-agency": {
        "display": "Web Development Agency"
    },
    "ecommerce-website-development-agency": {
        "display": "Ecommerce Website Development Agency"
    },
    "wordpress-website-development-agency": {
        "display": "WordPress Website Development Agency"
    }
}

ROOT_DIR = r"e:\suraj\cgnv\cgnv"

# 1. Handle India (Root)
india_locations = get_unique_locations(ROOT_DIR)
india_template = os.path.join(ROOT_DIR, "web-development-agency-in-delhi.php")
generate_pages_for_country(ROOT_DIR, india_locations, SERVICES, india_template, is_india=True)

# 2. Handle International Folders
country_folders = ['ar', 'au', 'bo', 'br', 'ca', 'cl', 'co', 'cr', 'cu', 'do', 'ec', 'jm', 'mx', 'nz', 'pa', 'pe', 'py', 'uae', 'uk', 'us', 'uy', 've']
intl_template_base = os.path.join(ROOT_DIR, "au", "web-development-agency-in-victoria.php")

for folder in country_folders:
    folder_path = os.path.join(ROOT_DIR, folder)
    if os.path.exists(folder_path):
        locations = get_unique_locations(folder_path)
        if locations:
            # For each folder, we can use the au/victoria template but we need to adjust the include paths
            # The au/victoria template already uses ../ so it should work for all subfolders.
            generate_pages_for_country(folder_path, locations, SERVICES, intl_template_base)
        else:
            print(f"No locations found in {folder}")
    else:
        print(f"Folder {folder} does not exist.")
