import os
import re

dir_path = r"e:\suraj\cgnv\cgnv"
states_to_strip = [
    "arunachal-pradesh",
    "manipur",
    "mizoram",
    "nagaland",
    "sikkim"
]

grid_pattern = re.compile(r'(<!-- STATE_CITIES_LOCATION_GRID_START -->.*?<!-- STATE_CITIES_LOCATION_GRID_END -->\s*)', re.DOTALL)

for state in states_to_strip:
    target_file = os.path.join(dir_path, f"best-digital-marketing-agency-in-{state}.php")
    if os.path.exists(target_file):
        with open(target_file, "r", encoding="utf-8", errors="ignore") as f:
            content = f.read()
            
        new_content = grid_pattern.sub('', content)
        
        with open(target_file, "w", encoding="utf-8") as f:
            f.write(new_content)
        print(f"Stripped grid from {state}")

