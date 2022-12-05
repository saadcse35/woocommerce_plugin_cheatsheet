<!-- Tab 5 -->
                <li   class="box5 tab-box ">
                    <div class="wrap">
                        <div class="option-box">
                            <p class="option-title"><?php _e('Grid Normal Settings ( Premium Only )', 'rst-testimonial'); ?></p>
                            <table class="form-table">
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="grid_normal_column"><?php _e('Number of columns', 'rst-testimonial') ?></label>
                                    </th>
                                    <td style="vertical-align: middle;">
                                        <select name="grid_normal_column" id="grid_normal_column"
                                                class="timezone_string">
                                            <option value="3" <?php if (isset ($grid_normal_column)) {
                                                selected($grid_normal_column, '3');
                                            } ?>><?php _e('3', 'rst-testimonial') ?></option>
                                            <option value="1" <?php if (isset ($grid_normal_column)) {
                                                selected($grid_normal_column, '1');
                                            } ?>><?php _e('1', 'rst-testimonial') ?></option>
                                            <option value="2" <?php if (isset ($grid_normal_column)) {
                                                selected($grid_normal_column, '2');
                                            } ?>><?php _e('2', 'rst-testimonial') ?></option>
                                            <option value="4" <?php if (isset ($grid_normal_column)) {
                                                selected($grid_normal_column, '4');
                                            } ?>><?php _e('4', 'rst-testimonial') ?></option>
                                            <option value="5" <?php if (isset ($grid_normal_column)) {
                                                selected($grid_normal_column, '5');
                                            } ?>><?php _e('5', 'rst-testimonial') ?></option>
                                            <option value="6" <?php if (isset ($grid_normal_column)) {
                                                selected($grid_normal_column, '6');
                                            } ?>><?php _e('6', 'rst-testimonial') ?></option>
                                        </select>
                                        <span class="rststestimonial_manager_hint"><?php echo __('Choose an option for posts column.', 'rst-testimonial'); ?></span>
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th scope="row">
                                        <label for="filter_menu_styles"><?php _e('Filter Menu Style', 'rst-testimonial') ?></label>
                                    </th>
                                    <td style="vertical-align: middle;">
                                        <select name="filter_menu_styles" id="filter_menu_styles"
                                                class="timezone_string">

                                            <option value="1" <?php if (isset ($filter_menu_styles)) {
                                                selected($filter_menu_styles, '1');
                                            } ?>><?php _e('Normal', 'rst-testimonial') ?></option>
                                            <option value="2" <?php if (isset ($filter_menu_styles)) {
                                                selected($filter_menu_styles, '2');
                                            } ?>><?php _e('Checkbox', 'rst-testimonial') ?></option>
                                            <option value="3" <?php if (isset ($filter_menu_styles)) {
                                                selected($filter_menu_styles, '3');
                                            } ?>><?php _e('Drop Down', 'rst-testimonial') ?></option>
                                        </select>
                                        <span class="rststestimonial_manager_hint"><?php echo __('Choose an option for filter menu style.', 'rst-testimonial'); ?></span>
                                    </td>
                                </tr>

                                <tr>
                                    <th><u><?php echo __('Menu Styling', 'rst-testimonial'); ?></u></th>
                                    <td></td>
                                </tr>

                                <tr valign="top">
                                    <th scope="row">
                                        <label for="filter_menu_alignment"><?php _e('Menu Align', 'rst-testimonial'); ?></label>
                                    </th>
                                    <td style="vertical-align: middle;">
                                        <div class="switch-field">
                                            <input type="radio" id="filter_menu_alignment1" name="filter_menu_alignment"
                                                   value="left" <?php if ($filter_menu_alignment == 'left') {
                                                echo 'checked';
                                            } ?>/>
                                            <label for="filter_menu_alignment1"><?php _e('Left', 'rst-testimonial'); ?></label>
                                            <input type="radio" id="filter_menu_alignment2" name="filter_menu_alignment"
                                                   value="center" <?php if ($filter_menu_alignment == 'center' || $filter_menu_alignment == '') {
                                                echo 'checked';
                                            } ?>/>
                                            <label for="filter_menu_alignment2"><?php _e('Center', 'rst-testimonial'); ?></label>
                                            <input type="radio" id="filter_menu_alignment3" name="filter_menu_alignment"
                                                   value="right" <?php if ($filter_menu_alignment == 'right') {
                                                echo 'checked';
                                            } ?>/>
                                            <label for="filter_menu_alignment3"><?php _e('Right', 'rst-testimonial'); ?></label>
                                        </div>
                                        <span class="rststestimonial_manager_hint"><?php echo __('Choose an option for the alignment of filter menu.', 'rst-testimonial'); ?></span>
                                    </td>
                                </tr><!-- End Menu Align -->

                                <tr valign="top">
                                    <th scope="row">
                                        <label for="filter_menu_bg_color"><?php _e('Background Color', 'rst-testimonial'); ?></label>
                                    </th>
                                    <td style="vertical-align: middle;">
                                        <input type="text" id="filter_menu_bg_color" name="filter_menu_bg_color"
                                               value="<?php if ($filter_menu_bg_color != '') {
                                                   echo esc_attr($filter_menu_bg_color);
                                               } else {
                                                   echo "#f8f8f8";
                                               } ?>" class="timezone_string">
                                        <span class="rststestimonial_manager_hint"><?php echo __('Pick a color for filter menu background.', 'rst-testimonial'); ?></span>
                                    </td>
                                </tr><!-- End Menu bg color -->

                                <tr valign="top">
                                    <th scope="row">
                                        <label for="filter_menu_font_color"><?php _e('Font Color', 'rst-testimonial'); ?></label>
                                    </th>
                                    <td style="vertical-align: middle;">
                                        <input type="text" id="filter_menu_font_color" name="filter_menu_font_color"
                                               value="<?php if ($filter_menu_font_color != '') {
                                                   echo esc_attr($filter_menu_font_color);
                                               } else {
                                                   echo "#777777";
                                               } ?>" class="timezone_string">
                                        <span class="rststestimonial_manager_hint"><?php echo __('Pick a color for text of filter menu.', 'rst-testimonial'); ?></span>
                                    </td>
                                </tr><!-- End Menu text color -->

                                <tr valign="top">
                                    <th scope="row">
                                        <label for="filter_menu_bg_color_hover"><?php _e('Background Color(Hover)', 'rst-testimonial'); ?></label>
                                    </th>
                                    <td style="vertical-align: middle;">
                                        <input type="text" id="filter_menu_bg_color_hover"
                                               name="filter_menu_bg_color_hover"
                                               value="<?php if ($filter_menu_bg_color_hover != '') {
                                                   echo esc_attr($filter_menu_bg_color_hover);
                                               } else {
                                                   echo "#003478";
                                               } ?>" class="timezone_string">
                                        <span class="rststestimonial_manager_hint"><?php echo __('Pick a color for filter menu background on hover.', 'rst-testimonial'); ?></span>
                                    </td>
                                </tr><!-- End Menu bg color on hover -->

                                <tr valign="top">
                                    <th scope="row">
                                        <label for="filter_menu_font_color_hover"><?php _e('Font Color(Hover)', 'rst-testimonial'); ?></label>
                                    </th>
                                    <td style="vertical-align: middle;">
                                        <input type="text" id="filter_menu_font_color_hover"
                                               name="filter_menu_font_color_hover"
                                               value="<?php if ($filter_menu_font_color_hover != '') {
                                                   echo esc_attr($filter_menu_font_color_hover);
                                               } else {
                                                   echo "#ffffff";
                                               } ?>" class="timezone_string">
                                        <span class="rststestimonial_manager_hint"><?php echo __('Pick a color for text of filter menu on hover.', 'rst-testimonial'); ?></span>
                                    </td>
                                </tr><!-- End Menu text color on hover -->

                                <tr valign="top">
                                    <th scope="row">
                                        <label for="filter_menu_bg_color_active"><?php _e('Background Color(Active)', 'rst-testimonial'); ?></label>
                                    </th>
                                    <td style="vertical-align: middle;">
                                        <input type="text" id="filter_menu_bg_color_active"
                                               name="filter_menu_bg_color_active"
                                               value="<?php if ($filter_menu_bg_color_active != '') {
                                                   echo esc_attr($filter_menu_bg_color_active);
                                               } else {
                                                   echo "#003478";
                                               } ?>" class="timezone_string">
                                        <span class="rststestimonial_manager_hint"><?php echo __('Pick a color for filter menu background on hover.', 'rst-testimonial'); ?></span>
                                    </td>
                                </tr><!-- End Menu bg color when active -->

                                <tr valign="top">
                                    <th scope="row">
                                        <label for="filter_menu_font_color_active"><?php _e('Font Color(Active)', 'rst-testimonial'); ?></label>
                                    </th>
                                    <td style="vertical-align: middle;">
                                        <input type="text" id="filter_menu_font_color_active"
                                               name="filter_menu_font_color_active"
                                               value="<?php if ($filter_menu_font_color_active != '') {
                                                   echo esc_attr($filter_menu_font_color_active);
                                               } else {
                                                   echo "#ffffff";
                                               } ?>" class="timezone_string">
                                        <span class="rststestimonial_manager_hint"><?php echo __('Pick a color for text of filter menu on hover.', 'rst-testimonial'); ?></span>
                                    </td>
                                </tr><!-- End Menu text color when active -->

                            </table>
                        </div>
                    </div>
                </li>