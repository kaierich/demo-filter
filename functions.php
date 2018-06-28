add_action( 'init', 'create_custom_taxonomy', 0 );


function create_custom_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Tiến độ', 'taxonomy general name', 'thuythu' ),
		'singular_name'     => _x( 'Tiến độ', 'taxonomy singular name', 'thuythu' ),
		'search_items'      => __( 'Tìm kiếm Tiến độ', 'thuythu' ),
		'all_items'         => __( 'Tất cả tiến độ', 'thuythu' ),
		'parent_item'       => __( 'Parent Tiến độ', 'thuythu' ),
		'parent_item_colon' => __( 'Parent Tiến độ:', 'thuythu' ),
		'edit_item'         => __( 'Edit Tiến độ', 'thuythu' ),
		'update_item'       => __( 'Update Tiến độ', 'thuythu' ),
		'add_new_item'      => __( 'Add New Tiến độ', 'thuythu' ),
		'new_item_name'     => __( 'New Tiến độ Name', 'thuythu' ),
		'menu_name'         => __( 'Tiến độ', 'thuythu' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'tien-do' ),
	);

	register_taxonomy( 'tien-do', array( 'post' ), $args );


	$labels = array(
		'name'              => _x( 'Sản phẩm', 'taxonomy general name', 'thuythu' ),
		'singular_name'     => _x( 'Sản phẩm', 'taxonomy singular name', 'thuythu' ),
		'search_items'      => __( 'Tìm kiếm Sản phẩm', 'thuythu' ),
		'all_items'         => __( 'Tất cả Sản phẩm', 'thuythu' ),
		'parent_item'       => __( 'Parent Sản phẩm', 'thuythu' ),
		'parent_item_colon' => __( 'Parent Sản phẩm:', 'thuythu' ),
		'edit_item'         => __( 'Edit Sản phẩm', 'thuythu' ),
		'update_item'       => __( 'Update Sản phẩm', 'thuythu' ),
		'add_new_item'      => __( 'Add New Sản phẩm', 'thuythu' ),
		'new_item_name'     => __( 'New Sản phẩm Name', 'thuythu' ),
		'menu_name'         => __( 'Sản phẩm', 'thuythu' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'san-pham' ),
	);

	register_taxonomy( 'san-pham', array( 'post' ), $args );
}
