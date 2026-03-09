import os
import re

dir_path = r"e:\suraj\cgnv\cgnv"

target_files = [f for f in os.listdir(dir_path) if f.startswith("best-digital-marketing-agency-in-") and f.endswith(".php")]

grid_pattern = re.compile(r'(<!-- STATE_CITIES_LOCATION_GRID_START -->.*?<!-- STATE_CITIES_LOCATION_GRID_END -->)', re.DOTALL)

count = 0

for target_file in target_files:
    slug = target_file.replace("best-digital-marketing-agency-in-", "").replace(".php", "")
    
    # Try to find a source file with the exact same grid
    source_file = None
    if os.path.exists(os.path.join(dir_path, f"content-marketing-agency-in-{slug}.php")):
        source_file = f"content-marketing-agency-in-{slug}.php"
        source_replace = {
            "content-marketing-agency": "best-digital-marketing-agency",
            "Content Marketing Agency": "Digital Marketing Agency",
            "Content Marketing services": "Digital Marketing services"
        }
    elif os.path.exists(os.path.join(dir_path, f"seo-company-in-{slug}.php")):
        source_file = f"seo-company-in-{slug}.php"
        source_replace = {
            "seo-company": "best-digital-marketing-agency",
            "SEO Company": "Digital Marketing Agency",
            "SEO services": "Digital Marketing services",
            "SEO": "Digital Marketing"
        }
    
    if source_file:
        with open(os.path.join(dir_path, source_file), "r", encoding="utf-8", errors="ignore") as f:
            source_content = f.read()
        
        m_source = grid_pattern.search(source_content)
        if m_source:
            new_grid = m_source.group(1)
            for k, v in source_replace.items():
                new_grid = new_grid.replace(k, v)
                
            with open(os.path.join(dir_path, target_file), "r", encoding="utf-8", errors="ignore") as f:
                target_content = f.read()
                
            new_target_content = grid_pattern.sub(new_grid, target_content)
            
            with open(os.path.join(dir_path, target_file), "w", encoding="utf-8") as f:
                f.write(new_target_content)
            count += 1
        else:
            print(f"Grid not found in {source_file}")
    else:
        print(f"No source file found for {slug}")

print(f"Fixed grids in {count} pages.")
