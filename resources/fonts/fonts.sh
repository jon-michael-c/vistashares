#!/bin/bash

# Function to rename files according to the schema
rename_files() {
    local folder=$1
    local font_family=$(basename "$folder")
    for file in "$folder"/*; do
        if [[ -f $file ]]; then
            local filename=$(basename "$file")
            local extension="${filename##*.}"
            local type=$(echo "$filename" | sed -E "s/^(.*)(21)?\.woff2?$/\1/" | sed -E "s/[0-9]+//")
            local new_name="${font_family}-${type}.${extension}"
            mv "$file" "$folder/$new_name"
        fi
    done
}

# Main script
main() {
    local base_dir="." # Change this to the directory containing your font folders if necessary
    for folder in "$base_dir"/*/; do
        rename_files "$folder"
    done
}

# Run the main script
main
